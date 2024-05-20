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
            'judul_sejarah' => 'required|string|max:255',
            'title_history' => 'required|string|max:255',
            'isi_sejarah' => 'required|string',
            'content_history' => 'required|string',
            'visi' => 'required|string',
            'visi_eng' => 'required|string',
            'misi' => 'required|string',
            'misi_eng' => 'required|string',
        ]);

        $data = Tentang::findOrFail($id);
        $data->update([
            'judul_sejarah' => $request->judul_sejarah,
            'title_history' => $request->title_history,
            'isi_sejarah' => $request->isi_sejarah,
            'content_history' => $request->content_history,
            'visi' => $request->visi,
            'visi_eng' => $request->visi_eng,
            'misi' => $request->misi,
            'misi_eng' => $request->misi_eng,
        ]);

        return redirect()->route('tentang.index')->with('success', 'Data updated successfully');
    }


}
