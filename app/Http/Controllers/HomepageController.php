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
            'gambar_rektor' => 'required|string|max:255',
        ]);

        $data = Home::findOrFail($id);
        $data->update([
            'judul_ptnbh' => $request->judul_ptnbh,
            'tentang_ptnbh' => $request->tentang_ptnbh,
            'sambutan_rektor' => $request->sambutan_rektor,
            'gambar_rektor' => $request->gambar_rektor,
        ]);

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
