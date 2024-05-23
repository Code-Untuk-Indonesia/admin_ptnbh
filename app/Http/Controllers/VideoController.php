<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q_video = Video::select('*')->orderByDesc('created_at');
            return DataTables::of($q_video)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn-sm app-btn-danger deleteAlbum" data-id="' . $row->id . '" href="#">Hapus</a>';
                    $btn .= '<a class="btn-sm app-btn-primary editAlbum" data-id="' . $row->id . '" href="#">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'Dokumentasi Video',
        ];

        return view('admin.content.video', $data);
    }

    public function create()
    {
        return view('admin.form.create-video');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul_id' => 'required|string',
                'judul_en' => 'required|string',
                'link' => 'required|string',
            ]);

            $video = new Video();
            $video->judul_id = $request->input('judul_id');
            $video->judul_en = $request->input('judul_en');
            $video->link = $request->input('link');

            $video->save();

            return redirect()->route('video.index')->with('success', 'Video berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
    public function edit($id)
    {
        $video = Video::find($id);
        return view('form.create-video', compact('video'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'judul_id' => 'required|string',
                'judul_en' => 'required|string',
                'link' => 'required|string',
            ]);

            $video = Video::find($id);
            if (!$video) {
                return redirect()->route('video.index')->withErrors(['error' => 'Video tidak ditemukan']);
            }

            $video->judul_id = $request->input('judul_id');
            $video->judul_en = $request->input('judul_en');
            $video->link = $request->input('link');

            $video->save();
            return redirect()->route('video.index')->with('success', 'Video berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return response()->json(['status' => 'error', 'message' => 'Video tidak ditemukan'], 404);
        }

        try {
            DB::transaction(function () use ($video) {
                $video->delete();
            });

            return response()->json(['status' => 'success', 'message' => 'Video berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
