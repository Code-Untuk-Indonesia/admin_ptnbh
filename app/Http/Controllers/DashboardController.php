<?php

namespace App\Http\Controllers;

use visitor;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Album;
use App\Models\Video;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Shetabit\Visitor\Models\Visit;
use App\Http\Controllers\Controller;
use App\Models\Galeri;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalBerita = Berita::count();
        $totalPengumuman = Pengumuman::count();
        $totalVideo = Video::count();
        $totalAlbum = Album::count();
        $totalVisits = Visit::count();
        $totalAgenda = Agenda::count();
        $totalusers = User::count();
        $totalgambar = Galeri::count();

        // Fetch yearly and monthly data for chart options
        $years = Visit::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');
        $months = Visit::selectRaw('MONTH(created_at) as month')->distinct()->pluck('month');

        // Fetch statistics for uploads
        $beritaStats = Berita::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $videoStats = Video::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $pengumumanStats = Pengumuman::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $albumStats = Album::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.dashboard-admin.dashboard', compact('years', 'months',
         'totalVisits', 'totalBerita', 'totalAgenda','totalgambar',
        'totalPengumuman', 'totalVideo', 'totalAlbum', 'beritaStats', 'videoStats', 'pengumumanStats', 'albumStats','totalusers'));
    }

    public function getVisitorData(Request $request)
    {
        $period = $request->input('period', 'day'); // Default to 'day' if no period is specified

        $query = Visit::query();

        switch ($period) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month);
                break;
            case 'year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }

        $visits = $query->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($visits);
    }
    public function getBeritaStats()
    {
        $beritaStats = Berita::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($beritaStats);
    }


    // public function visit()
    // {
    //     $totalVisits = Visit::count();
    //     $berita = Berita::all();
    //     $totalBerita = Berita::count();
    //     $totalPengumuman = Pengumuman::count();
    //     $totalVideo = Video::count();
    //     $totalAlbum = Album::count();
    //     return view('admin.dashboard-admin.dashboard', compact('totalVisits', 'totalBerita', 'totalPengumuman', 'totalVideo', 'totalAlbum', 'berita'));
    // }

    /**
     * Show the form for creating a new resource.
     */


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
