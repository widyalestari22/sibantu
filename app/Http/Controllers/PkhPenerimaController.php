<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class PkhPenerimaController extends Controller
{
    public function generatePdfPkhTAmpil()
    {
        ($penerima = Pkh::latest()->get());
        $data = [
            'title' => 'Laporan Penerima Program Keluarga Harapan',
            'penerima' => $penerima,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.cetak.pkh' untuk merender HTML
        $pdf->loadView('pkh.cetak.pkh', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporanpkh.pdf');
    }
    // }
    public function index()
    {
        $penerima = Pkh::latest()->get();
        return view('pkh.penerimaan.index', compact('penerima'));
    }


    public function create()
    {
        return view('pkh.penerimaan.create');
    }
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

        return redirect()->route('pkh.menerima')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $penerima = Pkh::findOrFail($id);
        return view('pkh.penerimaan.edit', compact('penerima'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama' => 'required|string',
    //         'nik' => 'required|numeric|min:16',
    //         'rt' => 'required',
    //         'rw' => 'required',
    //         'alamat' => 'required',
    //         'alasan' => 'required_if:jawaban,tidak|string|nullable',
    //     ]);

    //     $penerima = Pkh::findOrFail($id); // Mengambil data berdasarkan ID yang diberikan

    //     // Update data penerima dengan nilai baru dari form
    //     $penerima->nama = $request->nama;
    //     $penerima->nik = $request->nik;
    //     $penerima->rt = $request->rt;
    //     $penerima->rw = $request->rw;
    //     $penerima->alamat = $request->alamat;
    //     $penerima->jawaban_alasan = [
    //         'jawaban' => $request->jawaban,
    //         'alasan' => $request->alasan,
    //     ];

    //     $penerima->save();

    //     return redirect()->route('pkh.menerima')->with('success', 'Data berhasil diupdate');
    // }
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
        return redirect()->route('pkh.menerima')->with('success', 'Data berhasil diperbarui');
    }

    // public function destroy($id_pkh)
    // {
    //     $penerima = Pkh::findOrFail($id_pkh);
    //     $penerima->delete();

    //     return redirect()->route('pkh.menerima')->with('success', 'Data Penerima berhasil dihapus.');
    // }
    public function destroy($id_pkh)
    {
        $penerima = Pkh::findOrFail($id_pkh);
        $penerima->delete();

        return redirect()->route('pkh.menerima')->with('success', 'Data Penerima berhasil dihapus.');
    }
}
