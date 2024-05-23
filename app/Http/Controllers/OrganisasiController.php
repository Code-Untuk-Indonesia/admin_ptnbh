<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Organisasi::first();
        return view('admin.crud-organisasi.organisasi', compact('data'));
    }
    public function fe()
    {

        $data = Organisasi::first();
        return view('halaman-user.organisasi', compact('data'));
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
   // Menampilkan form edit
   public function edit($id)
   {
       $data = Organisasi::findOrFail($id);
       return view('admin.crud-organisasi.edit', compact('data'));
   }

   // Menyimpan perubahan
   public function update(Request $request, $id)
   {
       $request->validate([
           'organisasi_id' => 'required|string',
           'isi_organisasi_id' => 'required|string',
           'organisasi_en' => 'required|string',
           'isi_organisasi_en' => 'required|string',
       ]);

       $data = Organisasi::findOrFail($id);
       $data->update([
           'organisasi_id' => $request->organisasi_id,
           'isi_organisasi_id' => $request->isi_organisasi_id,
           'organisasi_en' => $request->organisasi_en,
           'isi_organisasi_en' => $request->isi_organisasi_en,
       ]);

       return redirect()->route('organisasi.index')->with('success', 'Data updated successfully');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
