<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Album;
use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Join galeri table with album table to get the album title
            $q_galeri = Galeri::join('albums', 'galeris.id_album', '=', 'albums.id')
                ->select('galeris.*', 'albums.judul_id as album_title')
                ->orderByDesc('galeris.created_at');

            return DataTables::of($q_galeri)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex flex-column align-items-center">';
                    $btn .= '<a class="btn btn-sm btn-danger w-50 d-flex flex-column align-items-center deleteGaleri" data-id="' . $row->id . '" href="#">';
                    $btn .= '<i class="fa fa-trash mb-1"></i> <span>Hapus</span></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'Galeri Foto',
        ];

        return view('admin.content.galeri-foto', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();
        return view('admin.form.create-galeri-foto', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_album' => 'required|exists:albums,id',
            'gambar_foto.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar_foto')) {
            foreach ($request->file('gambar_foto') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/galeri'), $imageName);

                Galeri::create([
                    'gambar' => $imageName,
                    'id_album' => $request->id_album,
                ]);
            }
        }

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil disimpan');
    }
    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        if (!$galeri) {
            return response()->json(['status' => 'error', 'message' => 'Foto tidak ditemukan'], 404);
        }

        try {
            DB::transaction(function () use ($galeri) {
                $galeri->delete();
            });

            return response()->json(['status' => 'success', 'message' => 'Foto berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function galeripage()
    {
        $totalGaleri = Galeri::count();
        $galeri = Album::orderBy('created_at', 'desc')->take(3)->get();

        return view('halaman-user.gallery', [
            'galeri' => $galeri,
            'totalGaleri' => $totalGaleri,
        ]);

    }

    public function loadMoreGaleri(Request $request)
    {
        if ($request->ajax()) {
            $skip = $request->input('skip', 0);
            $take = 3; // Ambil 3 agenda tambahan
            $galeris = Galeri::orderBy('created_at', 'desc')
                ->skip($skip)
                ->take($take)
                ->get();

            return response()->json($galeris);
        }
    }
}
