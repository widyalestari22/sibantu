<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Kategori;
use App\Models\Penerima;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StaffPenerimaanController extends Controller
{
    public function index()
    {
        $penerima = Penerima::with('kategori')->latest()->get();
        return view('staffdesa.penerimaan.index', compact('penerima'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('staffdesa.penerimaan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // dd($request->validate([]));
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            // 'nama_desa' => 'required',
            // 'nama_kecamatan' => 'required',
        ]);

        Penerima::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'kelamin' => $request->kelamin,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw, 'nama_desa' => 'Air Putih', // Set nilai default
            'nama_kecamatan' => 'Bengkalis', // Set nilai default
        ]);
        // return redirect()->route('staf.penerimaan')->with('success', 'Data Penerima Berhasil Ditambahkan ');
        return redirect()->route('staf.penerimaan')->with('success', 'Data Penerima Berhasil Ditambahkan');
    }

    public function edit($id_penerima)
    {
        $kategori = Kategori::get();
        $penerima = Penerima::findOrFail($id_penerima);

        return view('staffdesa.penerimaan.edit', compact('kategori', 'penerima'));
    }


    public function update(Request $request, $id_penerima)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);
        $penerima = Penerima::findOrFail($id_penerima);
        $penerima->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'kelamin' => $request->kelamin,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'nama_desa' => 'Air Putih', // Menetapkan nilai 'Air Putih'
            'nama_kecamatan' => 'Bengkalis', // Menetapkan nilai 'Bengkalis'
        ]);


        return redirect()->route('staf.penerimaan')->with('success', 'Data Penerima Berhasil Di Perbarui !!!');
    }
    public function destroy($id_penerima)
    {
        $penerima = Penerima::findOrFail($id_penerima);
        $penerima->delete();

        return redirect()->route('staf.penerimaan')->with('success', 'Data Penerima berhasil dihapus.');
    }
    public function detail($id_penerima)
    {
        $data = Penerima::find($id_penerima);
        return view('staffdesa.penerimaan.detail', compact('data'));
    }
}
