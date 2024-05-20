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
        return view('crud-organisasi.organisasi', compact('data'));
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
       return view('crud-organisasi.edit', compact('data'));
   }

   // Menyimpan perubahan
   public function update(Request $request, $id)
   {
       $request->validate([
           'organisasi' => 'required|string|max:255',
           'organization' => 'required|string|max:255',
           'isi_organisasi' => 'required|string',
           'organization_content' => 'required|string',
       ]);

       $data = Organisasi::findOrFail($id);
       $data->update([
           'organisasi' => $request->organisasi,
           'organization' => $request->organization,
           'isi_organisasi' => $request->isi_organisasi,
           'organization_content' => $request->organization_content,
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
