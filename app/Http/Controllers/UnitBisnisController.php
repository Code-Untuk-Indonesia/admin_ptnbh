<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unitbisnis;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class UnitBisnisController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q_unitbisnis = Unitbisnis::select('*')->orderByDesc('created_at');
            return DataTables::of($q_unitbisnis)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group" role="group" aria-label="Action Buttons">';
                    $btn .= '<a class="btn btn-sm btn-danger w-50 d-flex flex-column align-items-center deleteUnitbisnis" data-id="' . $row->id . '" href="#">';
                    $btn .= '<i class="fa fa-trash mb-1"></i> <span>Hapus</span></a>';
                    $btn .= '<a class="btn btn-sm btn-success w-50 d-flex flex-column align-items-center editUnitbisnis" data-id="' . $row->id . '" href="#">';
                    $btn .= '<i class="fa fa-edit mb-1"></i> <span>Edit</span></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'Unitbisnis',
        ];

        return view('admin.content.unitbisnis', $data);
    }

    public function create()
    {
        return view('admin.form.create-unitbisnis');
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_id' => 'required|string',
                'deskripsi_id' => 'required|string',
                'nama_en' => 'required|string',
                'deskripsi_en' => 'required|string',
            ]);

            $unitbisnis = new Unitbisnis();
            $unitbisnis->nama_id = $request->input('nama_id');
            $unitbisnis->deskripsi_id = $request->input('deskripsi_id');
            $unitbisnis->nama_en = $request->input('nama_en');
            $unitbisnis->deskripsi_en = $request->input('deskripsi_en');
            $unitbisnis->save();

            // Redirect to unitbisnis.index and show success message
            return redirect()->route('unit-bisnis.index')->with('success', 'Unitbisnis berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $unitbisnis = Unitbisnis::find($id);
        return view('admin.form.create-unitbisnis', compact('unitbisnis'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'nama_id' => 'required|string',
                'deskripsi_id' => 'required|string',
                'nama_en' => 'required|string',
                'deskripsi_en' => 'required|string',
            ]);

            $unitbisnis = Unitbisnis::find($id);
            if (!$unitbisnis) {
                return response()->json(['status' => 'error', 'message' => 'Unitbisnis tidak ditemukan'], 404);
            }

            $unitbisnis->nama_id = $request->input('nama_id');
            $unitbisnis->deskripsi_id = $request->input('deskripsi_id');
            $unitbisnis->nama_en = $request->input('nama_en');
            $unitbisnis->deskripsi_en = $request->input('deskripsi_en');
            $unitbisnis->save();
            return redirect()->route('unit-bisnis.index')->with('success', 'Unitbisnis berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    public function destroy($id)
    {
        $unitbisnis = Unitbisnis::find($id);
        if (!$unitbisnis) {
            return response()->json(['status' => 'error', 'message' => 'Unitbisnis tidak ditemukan'], 404);
        }

        try {
            DB::transaction(function () use ($unitbisnis) {
                $unitbisnis->delete();
            });

            return response()->json(['status' => 'success', 'message' => 'Unitbisnis berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
