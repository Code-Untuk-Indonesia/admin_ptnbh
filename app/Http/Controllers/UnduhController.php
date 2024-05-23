<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Unduh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class UnduhController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q_unduh = Unduh::select('*')->orderByDesc('created_at');
            return DataTables::of($q_unduh)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn-sm app-btn-danger deleteUnduh" data-id="' . $row->id . '" href="#">Hapus</a>';
                    $btn .= '<a class="btn-sm app-btn-primary editUnduh" data-id="' . $row->id . '" href="#">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'File Unduhan',
        ];

        return view('admin.content.unduh', $data);
    }

    public function create()
    {
        return view('admin.form.create-unduh');
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
                'file-unduh' => 'required|mimes:pdf|max:10000',
            ]);

            $unduh = new Unduh();
            $unduh->judul_id = $request->input('judul_id');
            $unduh->judul_en = $request->input('judul_en');

            if ($request->hasFile('file-unduh')) {
                $file = $request->file('file-unduh');
                $filename = time() . '_fileunduh' . $file->getClientOriginalExtension();
                $file->move(public_path('files/unduh'), $filename);
                $unduh->file = $filename;
            }

            $unduh->save();

            return redirect()->route('unduh.index')->with('success', 'File berhasil disimpan');
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
        $unduh = Unduh::find($id);
        return view('admin.form.create-unduh', compact('unduh'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'judul_id' => 'required|string',
                'judul_en' => 'required|string',
                'file-unduh' => 'nullable|mimes:pdf|max:10000',
            ]);

            $unduh = Unduh::findOrFail($id);
            $unduh->judul_id = $request->input('judul_id');
            $unduh->judul_en = $request->input('judul_en');

            if ($request->hasFile('file-unduh')) {
                if ($unduh->file) {
                    $oldFilePath = public_path('files/unduh/' . $unduh->file);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file = $request->file('file-unduh');
                $filename = time() . '_fileunduh' . $file->getClientOriginalExtension();
                $file->move(public_path('files/unduh'), $filename);
                $unduh->file = $filename;
            }

            $unduh->save();

            return redirect()->route('unduh.index')->with('success', 'File berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $unduh = Unduh::findOrFail($id);

            // Delete the file if it exists
            if ($unduh->file) {
                $filePath = public_path('files/unduh/' . $unduh->file);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $unduh->delete();

            return response()->json(['status' => 'success', 'message' => 'File berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
