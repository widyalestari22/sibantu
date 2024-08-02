<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\Pengumuman;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class PengumummanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('staffdesa.pengumuman.index', compact('pengumuman'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->merge([
            'status' => 'Aktif'
        ]);
        $request->validate([
            'pengumuman' => 'required|mimes:pdf|max:2048', // Hanya menerima file PDF maksimal 2MB
            // 'status' => 'required'
            'judul' => 'required',

        ]);
        $filePengu = '';
        if ($request->hasFile('pengumuman')) {
            $files = $request->file('pengumuman');
            $filePengu = date('YmdHi') . '_' . $files->getClientOriginalName();
            $files->move(public_path('pengumuman'), $filePengu);
        }
        pengumuman::create([
            'pengumuman' => $filePengu,
            'judul' => $request->input('judul'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil disimpan');
    }

    public function edit($id_pengumuman)
    {
        $pengumuman = Pengumuman::findOrFail($id_pengumuman);

        return response()->json($pengumuman); // Mengirimkan data dalam format JSON
    }


    public function update(Request $request, $id_pengumuman)
    {
        $request->validate([
            'pengumuman' => 'nullable|mimes:pdf|max:2048', // Tambahkan nullable agar file tidak wajib diunggah
            'status' => 'required',
            'judul' => 'required'
        ]);

        // Find the pengumuman record by ID
        $pengumuman = Pengumuman::findOrFail($id_pengumuman);

        $pengumuman->judul = $request->input('judul');
        $pengumuman->status = $request->input('status');

        // $pengajuan->kk = $request->kk
        if ($request->hasFile('pengumuman')) {
            $files = $request->file('pengumuman');
            $fileNamepengumuman = date('YmdHi') . $files->getClientOriginalName();
            $files->move(public_path('galeri'), $fileNamepengumuman);
            $pengumuman->pengumuman = $fileNamepengumuman;
        }


        // Save the changes to the database
        $pengumuman->save();

        // Redirect back with a success message
        return redirect()->route('pengumuman')->with('success', 'Data Berhasil Diedit');
    }




    public function destroy($id_pengumuman)
    {
        $pengumuman = Pengumuman::findOrFail($id_pengumuman);
        $pengumuman->delete();

        return redirect()->route('pengumuman')->with('success', 'Data pengumuman berhasil dihapus.');
    }
}