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



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            // Validasi data yang diterima dari formulir
            $validatedData = $request->validate([
                'judul' => 'required|string',
                'konten' => 'required|string',
                'gambar-berita' => 'required|image|mimes:jpeg,png,jpg,gif', // Sesuaikan dengan kebutuhan Anda
            ]);

            $gambar = $request->file('gambar-berita');
            $gambar_berita = time() . '_berita.'.$gambar->getClientOriginalExtension();
            $gambarPath = public_path('images/berita');
            $gambar->move($gambarPath,$gambar_berita);

            // Buat berita baru dengan menggunakan model Berita
            $berita = new Berita();
            $berita->judul = $request->input('judul');
            $berita->konten = $request->input('konten');
            $berita->gambar = $gambar_berita; // Simpan path gambar ke dalam database
            $berita->save();

            // Jika berhasil disimpan, kirimkan respon ke klien dengan sweet alert
            return response()->json(['message' => 'Berita berhasil disimpan'], 200);
        } catch (\Exception $e) {
            // Jika gagal menyimpan data, tangani kesalahan dan kirimkan pesan error
            return response()->json(['error' => 'Gagal menyimpan berita: ' . $e->getMessage()], 500);
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
