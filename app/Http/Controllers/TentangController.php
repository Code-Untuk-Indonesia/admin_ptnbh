<?php

namespace App\Http\Controllers;

use App\Models\tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    //
    public function index()
    {
        $data = tentang::first();
        return view('admin.crud-tentang.tentang', compact('data'));
    }

    public function edit($id)
    {
        $data = Tentang::findOrFail($id);
        return view('admin.crud-tentang.edit', compact('data'));
    }

    // Menyimpan perubahan
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_sejarah_id' => 'required|string|max:255',
            'judul_sejarah_en' => 'required|string|max:255',
            'isi_sejarah_id' => 'required|string',
            'isi_sejarah_en' => 'required|string',
            'visi_id' => 'required|string',
            'visi_en' => 'required|string',
            'misi_id' => 'required|string',
            'misi_en' => 'required|string',
            'judul_misi_id' => 'required|string',
            'judul_misi_en' => 'required|string',
            'judul_visi_id' => 'required|string',
            'judul_visi_en' => 'required|string',
            'judul_tujuan_id' => 'required|string',
            'judul_tujuan_en' => 'required|string',
            'tujuan_id' => 'required|string',
            'tujuan_en' => 'required|string',
        ]);

        $data = Tentang::findOrFail($id);
        $data->update([
            'judul_sejarah_id' => $request->judul_sejarah_id,
            'judul_sejarah_en' => $request->judul_sejarah_en,
            'isi_sejarah_id' => $request->isi_sejarah_id,
            'isi_sejarah_en' => $request->isi_sejarah_en,
            'judul_visi_id' => $request->judul_visi_id,
            'judul_visi_en' => $request->judul_visi_en,
            'judul_misi_id' => $request->judul_misi_id,
            'judul_misi_en' => $request->judul_misi_en,
            'visi_id' => $request->visi_id,
            'visi_en' => $request->visi_en,
            'misi_id' => $request->misi_id,
            'misi_en' => $request->misi_en,
            'judul_tujuan_id' => $request->judul_tujuan_id,
            'judul_tujuan_en' => $request->judul_tujuan_en,
            'tujuan_id' => $request->tujuan_id,
            'tujuan_en' => $request->tujuan_en,
        ]);

        return redirect()->route('tentang.index')->with('success', 'Data updated successfully');
    }



    public function fesejarah () {
        $data = tentang::first();
        return view('halaman-user.tentang', compact('data'));
    }

}
