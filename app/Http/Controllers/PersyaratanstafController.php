<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PersyaratanstafController extends Controller
{
    public function index()
    {
        $persyaratan = Persyaratan::all();
        return view('staffdesa.persyaratan.index', compact('persyaratan'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'persyaratan' => 'required',
        ]);

        $persyaratan = new Persyaratan();
        $persyaratan->id_persyaratan = $request->id_persyaratan;
        $persyaratan->persyaratan = $request->persyaratan;

        $persyaratan->save(); // Simpan objek Penyaluran ke dalam database

        // Tambahan: Mungkin Anda perlu redirect ke halaman tertentu setelah penyimpanan data
        return redirect()->route('persyaratan')->with('success', 'Data Berhasil Ditambahkan'); // Sesuaikan dengan rute yang benar
    }
    public function edit($id_persyaratan)
    {
        $persyaratan = Persyaratan::findOrFail($id_persyaratan);

        return response()->json($persyaratan); // Mengirimkan data dalam format JSON
    }


    public function update(Request $request, $id_persyaratan)
    {
        $request->validate([
            'persyaratan' => 'required'
        ]);

        // Find the persyaratan record by ID
        $persyaratan = Persyaratan::findOrFail($id_persyaratan);

        // Update the persyaratan field based on the form input
        $persyaratan->persyaratan = $request->input('persyaratan');

        // Save the changes to the database
        $persyaratan->save();

        // Redirect back with a success message
        return redirect()->route('persyaratan')->with('success', 'Persyaratan Pengajuan Berhasil di Perbaharui');
    }

    public function destroy($id_persyaratan)
    {
        $persyaratan = Persyaratan::findOrFail($id_persyaratan);
        $persyaratan->delete();

        return redirect()->route('persyaratan')->with('success', 'Data Persyaratan berhasil dihapus.');
    }
}
