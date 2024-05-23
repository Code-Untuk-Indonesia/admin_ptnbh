<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q_agenda = Agenda::select('*')->orderByDesc('created_at');
            return DataTables::of($q_agenda)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn-sm app-btn-danger deleteAgenda" data-id="' . $row->id . '" href="#">Hapus</a>';
                    $btn .= '<a class="btn-sm app-btn-primary editAgenda" data-id="' . $row->id . '" href="#">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'title' => 'Agenda',
        ];

        return view('admin.content.agenda', $data);
    }

    public function create()
    {
        return view('admin.form.create-agenda');
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul_id' => 'required|string',
                'deskripsi_id' => 'required|string',
                'judul_en' => 'required|string',
                'deskripsi_en' => 'required|string',
                'gambar-agenda' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'tanggal' => 'required|date',
                'waktu' => 'required',
                'lokasi' => 'required|string'
            ]);

            $agenda = new Agenda();
            $agenda->judul_id = $request->input('judul_id');
            $agenda->deskripsi_id = $request->input('deskripsi_id');
            $agenda->judul_en = $request->input('judul_en');
            $agenda->deskripsi_en = $request->input('deskripsi_en');
            $agenda->waktu_agenda = $request->input('waktu');
            $agenda->tanggal_agenda = $request->input('tanggal');
            $agenda->tempat_agenda = $request->input('lokasi');

            if ($request->hasFile('gambar-agenda')) {
                $gambar = $request->file('gambar-agenda');
                $gambar_agenda = time() . '_agenda.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/agenda');
                $gambar->move($gambarPath, $gambar_agenda);
                $agenda->gambar = $gambar_agenda;
            }

            $agenda->save();

            // Redirect to agenda.index and show success message
            return redirect()->route('agenda.index')->with('success', 'Agenda berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $agenda = Agenda::find($id);
        return view('admin.form.create-agenda', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'judul_id' => 'required|string',
                'deskripsi_id' => 'required|string',
                'judul_en' => 'required|string',
                'deskripsi_en' => 'required|string',
                'gambar-agenda' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'tanggal' => 'required|date',
                'waktu' => 'required',
                'lokasi' => 'required|string'
            ]);

            $agenda = Agenda::find($id);
            if (!$agenda) {
                return response()->json(['status' => 'error', 'message' => 'Agenda tidak ditemukan'], 404);
            }

            $agenda->judul_id = $request->input('judul_id');
            $agenda->deskripsi_id = $request->input('deskripsi_id');
            $agenda->judul_en = $request->input('judul_en');
            $agenda->deskripsi_en = $request->input('deskripsi_en');
            $agenda->waktu_agenda = $request->input('waktu');
            $agenda->tanggal_agenda = $request->input('tanggal');
            $agenda->tempat_agenda = $request->input('lokasi');

            if ($request->hasFile('gambar-agenda')) {
                // Delete the old image if exists
                if ($agenda->gambar) {
                    $oldImagePath = public_path('images/agenda/' . $agenda->gambar);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $gambar = $request->file('gambar-agenda');
                $gambar_agenda = time() . '_agenda.' . $gambar->getClientOriginalExtension();
                $gambarPath = public_path('images/agenda');
                $gambar->move($gambarPath, $gambar_agenda);
                $agenda->gambar = $gambar_agenda;
            }

            $agenda->save();
            return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data =Agenda::find($id);
        try {
            DB::transaction(function () use ($data) {
                if ($data != null) {
                    if ($data->gambar != null && $data->gambar != '') {
                        $image_path = public_path('images/agenda/' . $data->gambar);
                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                }
                $data->delete();
            });
            return response()->json(['status' => 'success', 'message' => 'Agenda berhasil dihapus']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function apiagenda()
    {
        $agenda = Agenda::orderBy('created_at', 'desc')->get();
        return response()->json($agenda);
    }
}
