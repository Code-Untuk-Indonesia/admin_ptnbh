<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q_pengumuman = Pengumuman::select('*')->orderByDesc('created_at');
            return DataTables::of($q_pengumuman)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn-sm app-btn-danger deletePengumuman" data-id="' . $row->id . '" href="#">Hapus</a>';
                    $btn .= '<a class="btn-sm app-btn-primary editPengumuman" data-id="' . $row->id . '" href="#">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'Pengumuman',
        ];

        return view('content.pengumuman', $data);
    }
    public function create()
    {
        return view('form.create-pengumuman');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required|string',
                'konten' => 'required|string',
                'gambar-pengumuman' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $pengumuman = new Pengumuman();
            $pengumuman->judul = $request->input('judul');
            $pengumuman->konten = $request->input('konten');

            if ($request->hasFile('gambar-pengumuman')) {
                $gambar = $request->file('gambar-pengumuman');
                $gambar_pengumuman = time() . '_pengumuman.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/pengumuman');
                $gambar->move($gambarPath, $gambar_pengumuman);
                $pengumuman->gambar = $gambar_pengumuman;
            }

            $pengumuman->save();

            return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('form.create-pengumuman', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required|string',
                'konten' => 'required|string',
                'gambar-pengumuman' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $pengumuman = Pengumuman::find($id);
            if (!$pengumuman) {
                return response()->json(['status' => 'error', 'message' => 'Pengumuman tidak ditemukan'], 404);
            }

            $pengumuman->judul = $request->input('judul');
            $pengumuman->konten = $request->input('konten');

            if ($request->hasFile('gambar-pengumuman')) {
                // Delete the old image if exists
                if ($pengumuman->gambar) {
                    $oldImagePath = public_path('images/pengumuman/' . $pengumuman->gambar);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $gambar = $request->file('gambar-pengumuman');
                $gambar_pengumuman = time() . '_pengumuman.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/pengumuman');
                $gambar->move($gambarPath, $gambar_pengumuman);
                $pengumuman->gambar = $gambar_pengumuman;
            }

            $pengumuman->save();
            return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data = Pengumuman::find($id);
        try {
            DB::transaction(function () use ($data) {
                if ($data != null) {
                    if ($data->gambar != null && $data->gambar != '') {
                        $image_path = public_path('images/pengumuman/' . $data->gambar);
                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                }
                $data->delete();
            });
            return response()->json(['status' => 'success', 'message' => 'Pengumuman berhasil dihapus']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function apipengumuman()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->get();
        return response()->json($pengumuman);
    }
}
