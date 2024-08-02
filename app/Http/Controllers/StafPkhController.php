<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Penerima;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;


class StafPkhController extends Controller
{
    public function index()
    {
        $penerima = Pkh::latest()->get();
        return view('staffdesa.pkh.index', compact('penerima'));
    }


    public function create()
    {
        return view('staffdesa.pkh.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|string',
    //         'nik' => 'required|numeric|min:16',
    //         'rt' => 'required',
    //         'rw' => 'required',
    //         'alamat' => 'required',
    //         'keterangan' => 'required',
    //         'alasan' => 'nullable|required_if:keterangan,Tidak|string',
    //     ]);

    //     $penerima = new Pkh();
    //     $penerima->nama = $request->nama;
    //     $penerima->nik = $request->nik;
    //     $penerima->rt = $request->rt;
    //     $penerima->rw = $request->rw;
    //     $penerima->alamat = $request->alamat;
    //     $penerima->keterangan = $request->keterangan;

    //     // Set alasan to null if keterangan is Iya
    //     $penerima->alasan = $request->keterangan == 'Iya' ? null : $request->alasan;

    //     $penerima->save();
    //     return view('staffdesa.pkh.index')->with('success', 'Data berhasil disimpan');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|numeric|min:16',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'alasan' => 'nullable|required_if:keterangan,Tidak|string',
        ]);

        $penerima = new Pkh();
        $penerima->nama = $request->nama;
        $penerima->nik = $request->nik;
        $penerima->rt = $request->rt;
        $penerima->rw = $request->rw;
        $penerima->alamat = $request->alamat;
        $penerima->keterangan = $request->keterangan;

        // Set alasan to null if keterangan is Iya
        $penerima->alasan = $request->keterangan == 'Iya' ? null : $request->alasan;

        $penerima->save();

        // Redirect back to the index page with a success message
        return redirect()->route('penerima.pkh')->with('success', 'Data berhasil disimpan');
    }


    public function edit($id)
    {
        $penerima = Pkh::findOrFail($id);
        return view('staffdesa.pkh.edit', compact('penerima'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|numeric|min:16',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'alasan' => 'nullable|required_if:keterangan,Tidak|string',
        ]);

        // Ambil data penerima berdasarkan ID
        $penerima = Pkh::findOrFail($id);

        // Update data penerima dengan nilai baru
        $penerima->nama = $request->nama;
        $penerima->nik = $request->nik;
        $penerima->rt = $request->rt;
        $penerima->rw = $request->rw;
        $penerima->alamat = $request->alamat;
        $penerima->keterangan = $request->keterangan;

        // Set alasan to null if keterangan is Iya
        $penerima->alasan = $request->keterangan == 'Iya' ? null : $request->alasan;

        $penerima->save();

        return redirect()->route('penerima.pkh')->with('success', 'Data berhasil diperbarui');
    }
    // return redirect()->route('penerima.pkh')->with('success', 'Data berhasil diupdate');
    public function detail($id_pkh)
    {
        $data = Pkh::find($id_pkh);
        return view('staffdesa.pkh.detail', compact('data'));
    }
    public function destroy($id_pkh)
    {
        $penerima = Pkh::findOrFail($id_pkh);
        $penerima->delete();

        return redirect()->route('penerima.pkh')->with('success', 'Data Penerima berhasil dihapus.');
    }
}
