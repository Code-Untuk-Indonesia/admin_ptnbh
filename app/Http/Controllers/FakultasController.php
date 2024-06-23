<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
class FakultasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q_fakultas = Fakultas::select('*')->orderByDesc('created_at');
            return DataTables::of($q_fakultas)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group" role="group" aria-label="Action Buttons">';
                    $btn .= '<a class="btn btn-sm btn-danger w-50 d-flex flex-column align-items-center deleteFakultas" data-id="' . $row->id . '" href="#">';
                    $btn .= '<i class="fa fa-trash mb-1"></i> <span>Hapus</span></a>';
                    $btn .= '<a class="btn btn-sm btn-success w-50 d-flex flex-column align-items-center editFakultas" data-id="' . $row->id . '" href="#">';
                    $btn .= '<i class="fa fa-edit mb-1"></i> <span>Edit</span></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'Fakultas',
        ];

        return view('admin.content.fakultas', $data);
    }

    public function create()
    {
        return view('admin.form.create-fakultas');
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'fakultas_id' => 'required|string',
                'deskripsi_id' => 'required|string',
                'fakultas_en' => 'required|string',
                'deskripsi_en' => 'required|string',
                'gambar-fakultas' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $fakultas = new Fakultas();
            $fakultas->fakultas_id = $request->input('fakultas_id');
            $fakultas->deskripsi_id = $request->input('deskripsi_id');
            $fakultas->fakultas_en = $request->input('fakultas_en');
            $fakultas->deskripsi_en = $request->input('deskripsi_en');

            if ($request->hasFile('gambar-fakultas')) {
                $gambar = $request->file('gambar-fakultas');
                $gambar_fakultas = time() . '_fakultas.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/fakultas');
                $gambar->move($gambarPath, $gambar_fakultas);
                $fakultas->gambar = $gambar_fakultas;
            }

            $fakultas->save();

            // Redirect to fakultas.index and show success message
            return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        return view('admin.form.create-fakultas', compact('fakultas'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'fakultas_id' => 'required|string',
                'deskripsi_id' => 'required|string',
                'fakultas_en' => 'required|string',
                'deskripsi_en' => 'required|string',
                'gambar-fakultas' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $fakultas = Fakultas::find($id);
            if (!$fakultas) {
                return response()->json(['status' => 'error', 'message' => 'Fakultas tidak ditemukan'], 404);
            }

            $fakultas->fakultas_id = $request->input('fakultas_id');
            $fakultas->deskripsi_id = $request->input('deskripsi_id');
            $fakultas->fakultas_en = $request->input('fakultas_en');
            $fakultas->deskripsi_en = $request->input('deskripsi_en');

            if ($request->hasFile('gambar-fakultas')) {
                // Delete the old image if exists
                if ($fakultas->gambar) {
                    $oldImagePath = public_path('images/fakultas/' . $fakultas->gambar);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $gambar = $request->file('gambar-fakultas');
                $gambar_fakultas = time() . '_fakultas.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/fakultas');
                $gambar->move($gambarPath, $gambar_fakultas);
                $fakultas->gambar = $gambar_fakultas;
            }

            $fakultas->save();
            return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data = Fakultas::find($id);
        try {
            DB::transaction(function () use ($data) {
                if ($data != null) {
                    if ($data->gambar != null && $data->gambar != '') {
                        $image_path = public_path('images/fakultas/' . $data->gambar);
                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                }
                $data->delete();
            });
            return response()->json(['status' => 'success', 'message' => 'Fakultas berhasil dihapus']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
