<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class StafPengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::latest()->get();
        return view('staffdesa.pengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        return view('staffdesa.pengajuan.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'penghasilan' => 'required',
            'validasi' => 'required',
            'tanpa_bantuan' => 'required',
            'tanggungan' => 'required',
            'rumah' => 'mimes:jpg,jpeg,png|max:2024',
            'elektronik' => 'required|array',
            'tanah' => 'required',
            'kk' => 'mimes:jpg,jpeg,png|max:2024',
            'ktp' => 'mimes:jpg,jpeg,png|max:2024',
        ]);

        // Mengonversi array 'elektronik' menjadi string dengan koma sebagai delimiter
        $elektronik = implode(',', $request->input('elektronik'));

        // Proses penyimpanan file 'rumah'
        $fileNameRumah = '';
        if ($request->hasFile('rumah')) {
            $files = $request->file('rumah');
            $fileNameRumah = date('YmdHi') . '_' . $files->getClientOriginalName();
            $files->move(public_path('galeri'), $fileNameRumah);
        }

        // Proses penyimpanan file 'kk'
        $fileNamekk = '';
        if ($request->hasFile('kk')) {
            $files = $request->file('kk');
            $fileNamekk = date('YmdHi') . '_' . $files->getClientOriginalName();
            $files->move(public_path('galeri'), $fileNamekk);
        }

        // Proses penyimpanan file 'ktp'
        $fileNamektp = '';
        if ($request->hasFile('ktp')) {
            $files = $request->file('ktp');
            $fileNamektp = date('YmdHi') . '_' . $files->getClientOriginalName();
            $files->move(public_path('galeri'), $fileNamektp);
        }
        // Simpan data ke dalam database
        Pengajuan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'kelamin' => $request->kelamin,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'penghasilan' => $request->penghasilan,
            'validasi' => 'Progres Pengajuan',
            'tanpa_bantuan' => $request->tanpa_bantuan,
            'tanggungan' => $request->tanggungan,
            'rumah' => $fileNameRumah,
            'elektronik' => $elektronik,
            'tanah' => $request->tanah,
            'nama_desa' => 'Air Putih', // Set nilai default
            'nama_kecamatan' => 'Bengkalis', // Set nilai
            'kk' => $fileNamekk,
            'ktp' => $fileNamektp
        ]);

        return redirect()->route('pengajuan.rt')->with('success', 'Data Penerima Berhasil Ditambahkan');
    }
    public function cetakPdf()
    {
        $pengajuan = Pengajuan::all();
        return view('staffdesa.pengajuan.cetak-pengajuan', compact('pengajuan'));
    }
    public function edit($id)
    {
        $pengajuan = Pengajuan::find($id);
        return view('staffdesa.pengajuan.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'penghasilan' => 'required',
            'validasi' => 'required',
            'tanpa_bantuan' => 'required',
            'kk' => 'mimes:jpg,jpeg,png|max:2024',
            'ktp' => 'mimes:jpg,jpeg,png|max:2024',
        ]);

        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return redirect()->route('pengajuan.staf.edit')->with('error', 'Data Penerima tidak ditemukan');
        }

        $pengajuan->nama = $request->nama;
        $pengajuan->nik = $request->nik;
        $pengajuan->kelamin = $request->kelamin;
        $pengajuan->alamat = $request->alamat;
        $pengajuan->rt = $request->rt;
        $pengajuan->rw = $request->rw;
        $pengajuan->penghasilan = $request->penghasilan;
        $pengajuan->validasi = $request->validasi;
        $pengajuan->tanpa_bantuan = $request->tanpa_bantuan;
        $pengajuan->nama_desa = 'Air Putih'; // Set nilai default
        $pengajuan->nama_kecamatan = 'Bengkalis'; // Set nilai default
        // $pengajuan->kk = $request->kk
        if ($request->hasFile('kk')) {
            $files = $request->file('kk');
            $fileNamekk = date('YmdHi') . $files->getClientOriginalName();
            $files->move(public_path('galeri'), $fileNamekk);
            $pengajuan->kk = $fileNamekk;
        }
        if ($request->hasFile('ktp')) {
            $files = $request->file('ktp');
            $fileNamektp = date('YmdHi') . $files->getClientOriginalName();
            $files->move(public_path('galeri'), $fileNamektp);
            $pengajuan->ktp = $fileNamektp;
        }
        $pengajuan->save();

        return redirect()->route('staf.pengajuan')->with('success', 'Data Penerima Berhasil Diperbarui');
    }

    public function detail($id_pengajuan)
    {
        $data = Pengajuan::find($id_pengajuan);
        return view('staffdesa.pengajuan.detail', compact('data'));
    }
    public function destroy($id_pengajuan)
    {
        $penerima = Pengajuan::findOrFail($id_pengajuan);
        $penerima->delete();

        return redirect()->route('pengajuan.rt')->with('success', 'Data Penerima berhasil dihapus.');
    }
}
