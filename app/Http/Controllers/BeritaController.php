<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q_berita = Berita::select('*')->orderByDesc('created_at');
            return DataTables::of($q_berita)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn-sm app-btn-danger deleteBerita" data-id="' . $row->id . '" href="#">Hapus</a>';
                    $btn .= '<a class="btn-sm app-btn-primary editBerita" data-id="' . $row->id . '" href="#">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'Berita',
        ];

        return view('content.berita', $data);
    }

public function create()
    {
        return view('form.create-berita');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required|string',
                'konten' => 'required|string',
                'gambar-berita' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $berita = new Berita();
            $berita->judul = $request->input('judul');
            $berita->konten = $request->input('konten');

            if ($request->hasFile('gambar-berita')) {
                $gambar = $request->file('gambar-berita');
                $gambar_berita = time() . '_berita.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/berita');
                $gambar->move($gambarPath, $gambar_berita);
                $berita->gambar = $gambar_berita;
            }

            $berita->save();

            return response()->json(['message' => 'Berita berhasil disimpan'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan berita: ' . $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('form.create-berita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required|string',
                'konten' => 'required|string',
                'gambar-berita' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $berita = Berita::find($id);
            $berita->judul = $request->input('judul');
            $berita->konten = $request->input('konten');

            if ($request->hasFile('gambar-berita')) {
                $gambar = $request->file('gambar-berita');
                $gambar_berita = time() . '_berita.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/berita');
                $gambar->move($gambarPath, $gambar_berita);
                $berita->gambar = $gambar_berita;
            }

            $berita->save();

            return response()->json(['message' => 'Berita berhasil diperbarui'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui berita: ' . $e->getMessage()], 500);
        }
    }
    public function destroy($id)
    {
        $data = Berita::find($id);
        try {
            DB::transaction(function () use ($data) {
                if ($data != null) {
                    if ($data->gambar != null && $data->gambar != '') {
                        $image_path = public_path('images/berita/' . $data->gambar);
                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                }
                $data->delete();
            });
            return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
