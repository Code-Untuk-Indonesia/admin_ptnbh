<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
                'judul_id' => 'required|string',
                'konten_id' => 'required|string',
                'judul_en' => 'required|string',
                'konten_en' => 'required|string',
                'gambar-berita' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $berita = new Berita();
            $berita->judul_id = $request->input('judul_id');
            $berita->konten_id = $request->input('konten_id');
            $berita->judul_en = $request->input('judul_en');
            $berita->konten_en = $request->input('konten_en');
            $berita->slug = Str::slug($request->input('judul_id'));

            if ($request->hasFile('gambar-berita')) {
                $gambar = $request->file('gambar-berita');
                $gambar_berita = time() . '_berita.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/berita');
                $gambar->move($gambarPath, $gambar_berita);
                $berita->gambar = $gambar_berita;
            }

            $berita->save();

            return redirect()->route('berita.index')->with('success', 'Berita berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
                'judul_id' => 'required|string',
                'konten_id' => 'required|string',
                'judul_en' => 'required|string',
                'konten_en' => 'required|string',
                'gambar-berita' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $berita = Berita::find($id);
            if (!$berita) {
                return response()->json(['status' => 'error', 'message' => 'Berita tidak ditemukan'], 404);
            }


            $berita->judul_id = $request->input('judul_id');
            $berita->konten_id = $request->input('konten_id');
            $berita->judul_en = $request->input('judul_en');
            $berita->konten_en = $request->input('konten_en');
            $berita->slug = Str::slug($request->input('judul_id'));

            if ($request->hasFile('gambar-berita')) {
                // Delete the old image if exists
                if ($berita->gambar) {
                    $oldImagePath = public_path('images/berita/' . $berita->gambar);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $gambar = $request->file('gambar-berita');
                $gambar_berita = time() . '_berita.' . $gambar->getClientOriginalExtension();
                $gambar->storeAs('images/berita', $gambar_berita);
                $berita->gambar = $gambar_berita;
            }

            $berita->save();
            return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui berita. Silakan coba lagi.']);
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

    public function apiberita()
    {
        // Retrieve all berita ordered by the latest created_at
        $berita = Berita::orderBy('created_at', 'desc')->get();
        return response()->json($berita);
    }

    public function showID($id)
    {
        $berita = Berita::select('judul_id as judul', 'konten_id as konten', 'gambar')
                        ->where('id', $id)
                        ->firstOrFail();

        return view('halaman-user.show', compact('berita'));
    }

    public function showEN($id)
    {
        $berita = Berita::select('judul_en as judul', 'konten_en as konten', 'gambar')
                        ->where('id', $id)
                        ->firstOrFail();

        return view('halaman-user.show', compact('berita'));
    }


    public function beritaathome()
    {
        $berita = Berita::orderBy('created_at', 'desc')->take(6)->get();
        return view('halaman-user.home', compact('berita'));
    }
}
