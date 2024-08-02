@extends('rt.layouts.app')

@section('title', 'Penerima Bantuan PKH')

@section('content')
    <div class="pagetitle">
        <h1>Desa Air Putih</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Penerimaan Bantuan PKH</li>
            </ol>
        </nav>
        {{-- <a href="{{ route('create.penerima.pkh') }}"> <button type="button"
                class="btn btn-primary rounded-pill">Tambah</button></a>
        <button type="button" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#">
            Cetak
        </button> --}}
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
                                    <th scope="col">Rt</th>
                                    <th scope="col">Rw</th>
                                    <th scope="col">kelayakan</th>
                                    <th scope="col">alasan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerima as $pen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pen->nama }}</td>
                                        <td>{{ $pen->nik }}</td>
                                        <td>{{ $pen->rt }}</td>
                                        <td>{{ $pen->rw }}</td>
                                        @php
                                            $jawaban_alasan = explode('|', $pen->jawaban_alasan);
                                        @endphp

                                        @if (count($jawaban_alasan) >= 2)
                                            <td>{{ $jawaban_alasan[0] }}</td>
                                            <td>{{ $jawaban_alasan[1] }}</td>
                                        @else
                                            <td colspan="2">Data jawaban dan alasan tidak tersedia</td>
                                        @endif
                                        <td>
                                            <a href="#">
                                                <button type="button" class="btn btn-info"><i
                                                        class="bi bi-eye-fill"></i></i></button>
                                            </a>
                                            <a href="{{ route('edit.penerima.pkh', ['id' => $pen->id_pkh]) }}">
                                                <button type="button" class="btn btn-warning"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </a>
                                            <a href="{{ route('destroy.penerima.pkh', ['id' => $pen->id_pkh]) }}"
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
