@extends('rt.layouts.app')

@section('title, Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Pengajuan BLT DD</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan BLT DD</li>
            </ol>
        </nav>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="/rt/pengajuan/create"> <button type="button" class="btn btn-primary rounded-pill">Tambah</button></a>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Bantuan Lain</th>
                                    <th scope="col">Penghasilan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan as $juan)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td> {{ $juan->nama }} </td>
                                        <td>{{ $juan->nik }}</td>
                                        <td>{{ $juan->alamat }} </td>
                                        <td>{{ $juan->tanpa_bantuan }}</td>
                                        <td>{{ $juan->penghasilan }}</td>
                                        <td>
                                            <a href="{{ route('pengajuan.detail', ['id' => $juan->id_pengajuan]) }}">
                                                <button type="button" class="btn btn-info"><i
                                                        class="bi bi-eye-fill"></i></i></button>
                                            </a>
                                            {{-- {{ route('staf.pengguna.edit', ['id' => $user->id]) }} --}}

                                            {{-- {{ route('edit.penerima.pkh', ['id' => $pen->id_pkh]) }} --}}
                                            <a href="  {{ route('pengajuan.rt.edit', ['id' => $juan->id_pengajuan]) }}">
                                                <button type="button" class="btn btn-warning"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </a>
                                            {{-- {{ route('penggunas.hapus', ['id' => $user->id]) }} --}}

                                            <a href="{{ route('pengajuan.destroy', ['id' => $juan->id_pengajuan]) }}"
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
