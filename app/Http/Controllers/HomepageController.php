<?php

namespace App\Http\Controllers;

use App\Models\home;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = home::first();
        return view('crud-home.ptnbh-section', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = Home::findOrFail($id);
        return view('crud-home.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_ptnbh' => 'required|string|max:255',
            'tentang_ptnbh' => 'required|string',
            'sambutan_rektor' => 'required|string',
            'gambar_rektor' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = Home::findOrFail($id);

        // Update data kecuali gambar_rektor
        $data->judul_ptnbh = $request->judul_ptnbh;
        $data->tentang_ptnbh = $request->tentang_ptnbh;
        $data->sambutan_rektor = $request->sambutan_rektor;

        if ($request->hasFile('gambar_rektor')) {
            // Menghapus gambar lama jika ada
            if ($data->gambar_rektor && file_exists(public_path('images/' . $data->gambar_rektor))) {
                unlink(public_path('images/berita' . $data->gambar_rektor));
            }

            // Upload gambar baru
            $file = $request->file('gambar_rektor');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $filename);

            // Update field gambar_rektor dengan nama file baru
            $data->gambar_rektor = $filename;
        }

        $data->save();

        return redirect()->route('home.index')->with('success', 'Data updated successfully');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function apihome() {
        $data = home::all();
        return response()->json($data);
    }
}
