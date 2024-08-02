@extends('pkh.layouts.app')

@section('title, Penerima Bantuan')
@section('content')
    <div class="pagetitle">
        <h1>Desa Air Putih</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Penerimaan Bantuan PKH</li>
            </ol>
        </nav>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('pkh.create') }}"> <button type="button" class="btn btn-primary rounded-pill">Tambah</button></a>
        {{-- <a href="{{ route('pkh.cetak') }}"> <button type="button" class="btn btn-success rounded-pill">Cetak</button></a> --}}
        {{-- <form action="{{ route('pkh.cetak') }}" method="get">
            <button type="submit" class="btn btn-success rounded-pill">Cetak</button>
        </form> --}}
        <a href="{{ route('pkh.tampil') }}" target="_blank"> <button type="button"
                class="btn btn-success rounded-pill">Cetak</button></a>

    </div>
    <section class="section">


        <div class="card">
            <div class="row">
                <div class="col-lg-12">




                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Penerima</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Alamat</th>
                                    <td scope="col">Kelayakan</td>
                                    {{-- <td scope="col">alasan</td> --}}

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
                                        <td>{{ $pen->keterangan }}
                                            {{-- <td>{{ $pen->alasan }} --}}

                                        <td>
                                            <a href="#">
                                                <button type="button" class="btn btn-info"><i
                                                        class="bi bi-eye-fill"></i></i></button>
                                            </a>
                                            {{-- {{ route('staf.pengguna.edit', ['id' => $user->id]) }} --}}
                                            <a href="{{ route('pkh.edit', ['id' => $pen->id_pkh]) }}">
                                                <button type="button" class="btn btn-warning"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </a>
                                            {{-- {{ route('penggunas.hapus', ['id' => $user->id]) }} --}}
                                            <a href="{{ route('pkh.destroy.pkh', ['id' => $pen->id_pkh]) }}"
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
