@extends('rt.layouts.app')

@section('title', 'Detail Penerima')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Data Penerima BLT DD</h5>

            <table cellpadding="7">
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Nik</td>
                    <td> : </td>
                    <td>{{ $data->nik }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td> : </td>
                    <td>{{ $data->kelamin }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : </td>
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <td>RT</td>
                    <td> : </td>
                    <td>{{ $data->rt }}</td>
                </tr>
                <tr>
                    <td>RW</td>
                    <td> : </td>
                    <td>{{ $data->rw }}</td>
                </tr>
                <tr>
                    <td>Nama Desa</td>
                    <td> : </td>
                    <td>{{ $data->nama_desa }}</td>
                </tr>
                <tr>
                    <td>Nama Kecamatan</td>
                    <td> : </td>
                    <td>{{ $data->nama_kecamatan }}</td>
                </tr>
                <!-- Tambahkan bagian-bagian yang lain sesuai kebutuhan -->

            </table>

            <form action="{{ url()->previous() }}" class="text-center" method="get">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Kembali</button>
            </form>
        </div>
    </div>
@endsection
