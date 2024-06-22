<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q_faq = Faq::select('*')->orderByDesc('created_at');
            return DataTables::of($q_faq)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group" role="group" aria-label="Action Buttons">';
                    $btn .= '<a class="btn btn-sm btn-danger w-50 d-flex flex-column align-items-center deleteFaq" data-id="' . $row->id . '" href="#">';
                    $btn .= '<i class="fa fa-trash mb-1"></i> <span>Hapus</span></a>';
                    $btn .= '<a class="btn btn-sm btn-success w-50 d-flex flex-column align-items-center editFaq" data-id="' . $row->id . '" href="#">';
                    $btn .= '<i class="fa fa-edit mb-1"></i> <span>Edit</span></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'Faq',
        ];

        return view('admin.content.faq', $data);
    }

    public function create()
    {
        return view('admin.form.create-faq');
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul_id' => 'required|string',
                'deskripsi_id' => 'required|string',
                'judul_en' => 'required|string',
                'deskripsi_en' => 'required|string',
            ]);

            $faq = new Faq();
            $faq->judul_id = $request->input('judul_id');
            $faq->deskripsi_id = $request->input('deskripsi_id');
            $faq->judul_en = $request->input('judul_en');
            $faq->deskripsi_en = $request->input('deskripsi_en');
            $faq->save();

            // Redirect to faq.index and show success message
            return redirect()->route('faq.index')->with('success', 'Faq berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.form.create-faq', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'judul_id' => 'required|string',
                'deskripsi_id' => 'required|string',
                'judul_en' => 'required|string',
                'deskripsi_en' => 'required|string',
            ]);

            $faq = Faq::find($id);
            if (!$faq) {
                return response()->json(['status' => 'error', 'message' => 'Faq tidak ditemukan'], 404);
            }

            $faq->judul_id = $request->input('judul_id');
            $faq->deskripsi_id = $request->input('deskripsi_id');
            $faq->judul_en = $request->input('judul_en');
            $faq->deskripsi_en = $request->input('deskripsi_en');
            $faq->save();
            return redirect()->route('faq.index')->with('success', 'Faq berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    public function destroy($id)
    {
        $faq = Faq::find($id);
        if (!$faq) {
            return response()->json(['status' => 'error', 'message' => 'Faq tidak ditemukan'], 404);
        }

        try {
            DB::transaction(function () use ($faq) {
                $faq->delete();
            });

            return response()->json(['status' => 'success', 'message' => 'Faq berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
