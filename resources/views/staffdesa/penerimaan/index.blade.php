@extends('staffdesa.layouts.app')

@section('title, Penerima Bantuan')
@section('content')
    <div class="pagetitle">
        <h1>Penerima Bantuan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staf/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Penerimaan Bantuan Langsung Dana Desa</li>
            </ol>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('penerimaan.create') }}"> <button type="button"
                    class="btn btn-primary rounded-pill">Tambah</button></a>
            <a href="{{ route('blt.cetak') }}" target="_blank"> <button type="button"
                    class="btn btn-success rounded-pill">Cetak</button></a>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Penerima</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Desa</th>
                                    <th scope="col">Kecamatan</th>
                                    {{-- <th scope="col">Jenis Bantuan</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerima as $pen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pen->nama }}</td>
                                        <td>{{ $pen->nik }}</td>
                                        <td>{{ $pen->alamat }}</td>
                                        <td>{{ $pen->nama_desa }}</td>
                                        <td>{{ $pen->nama_kecamatan }}</td>
                                        <td>
                                            <a href="{{ route('staf.penerimablt.detail', ['id' => $pen->id_penerima]) }}">
                                                <button type="button" class="btn btn-info"><i
                                                        class="bi bi-eye-fill"></i></button>
                                            </a>
                                            <a href="{{ route('penerima.edit', ['id' => $pen->id_penerima]) }}">
                                                <button type="button" class="btn btn-warning"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </a>
                                            {{-- {{ route('penggunas.hapus', ['id' => $user->id]) }} --}}
                                            <a href="{{ route('penerima.destroy', ['id' => $pen->id_penerima]) }}"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <button type="button" class="btn btn-danger"><i
                                                        class="bi bi-eraser-fill"></i></button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
