<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        $totalBerita = Berita::count();
        $totalPengumuman = Pengumuman::count();
        $totalVideo = Video::count();
        $totalAlbum = Album::count();
        return view('admin.dashboard-admin.dashboard', compact('berita', 'totalBerita','totalPengumuman','totalVideo','totalAlbum'));
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
    public function destroy(string $id)
    {
        //
    }
}
