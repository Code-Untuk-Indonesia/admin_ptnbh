<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Berita;
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
        return view('admin.crud-home.ptnbh-section', compact('data'));
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
        return view('admin.crud-home.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_ptnbh_id' => 'required|string|max:255',
            'judul_ptnbh_en' => 'required|string|max:255',
            'tentang_ptnbh_id' => 'required|string',
            'tentang_ptnbh_en' => 'required|string',
            'sambutan_rektor_id' => 'required|string',
            'sambutan_rektor_en' => 'required|string',
            'judul_rektor_id' => 'required|string',
            'judul_rektor_en' => 'required|string',
            'gambar_rektor' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = Home::findOrFail($id);

        // Update data kecuali gambar_rektor
        $data->judul_ptnbh_id = $request->judul_ptnbh_id;
        $data->judul_ptnbh_en = $request->judul_ptnbh_en;
        $data->tentang_ptnbh_id = $request->tentang_ptnbh_id;
        $data->tentang_ptnbh_en = $request->tentang_ptnbh_en;
        $data->sambutan_rektor_id = $request->sambutan_rektor_id;
        $data->sambutan_rektor_en = $request->sambutan_rektor_en;
        $data->judul_rektor_id = $request->judul_rektor_id;
        $data->judul_rektor_en = $request->judul_rektor_en;

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

    public function fehome() {
        $data = home::first();
        $berita = Berita::latest()->take(3)->get();
        $galeri = Album::latest()->take(3)->get();
        return view('halaman-user.home', compact('data', 'berita','galeri'));
    }
}
