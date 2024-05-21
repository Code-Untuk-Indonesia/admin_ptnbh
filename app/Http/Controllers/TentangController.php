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
        return view('crud-tentang.tentang', compact('data'));
    }

    public function edit($id)
    {
        $data = Tentang::findOrFail($id);
        return view('crud-tentang.edit', compact('data'));
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
            'visi_eng' => 'required|string',
            'misi_id' => 'required|string',
            'misi_eng' => 'required|string',
        ]);

        $data = Tentang::findOrFail($id);
        $data->update([
            'judul_sejarah_id' => $request->judul_sejarah_id,
            'judul_sejarah_en' => $request->judul_sejarah_en,
            'isi_sejarah_id' => $request->isi_sejarah_id,
            'isi_sejarah_en' => $request->isi_sejarah_en,
            'visi_id' => $request->visi_id,
            'visi_eng' => $request->visi_eng,
            'misi_id' => $request->misi_id,
            'misi_eng' => $request->misi_eng,
            'tujuan_id' => $request->tujuan_id,
            'tujuan_eng' => $request->tujuan_eng,
        ]);

        return redirect()->route('tentang.index')->with('success', 'Data updated successfully');
    }


    public function fesejarah () {
        $data = tentang::first();
        return view('halaman-user.tentang', compact('data'));
    }

}
