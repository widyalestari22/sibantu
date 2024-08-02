@extends('staffdesa.layouts.app')

@section('title', 'Persyaratan')
@section('content')
    <div class="pagetitle">
        <h1>Persyaratan Pengajuan BLT DD</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.dashboard">Home</a></li>
                <li class="breadcrumb-item active">Persyaratan Pengajuan Bantuan Langsung Tunai Dana Desa</li>
            </ol>
        </nav>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah
        </button>

    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Persyaratan</th>
                                    <th scope="col">Di Buat Pada</th>
                                    <th scope="col">Di Perbarui Pada</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persyaratan as $per)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $per->persyaratan }}</td>
                                        <td>{{ $per->updated_at->format('d-m-Y') }}</td>
                                        <td>{{ $per->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalUbah{{ $per->id_persyaratan }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <a href="{{ route('persayratan.destroy', ['id' => $per->id_persyaratan]) }}"
                                                onclick="return confirm('Yakin ingin menghapus pengajuan ini?')">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="bi bi-eraser-fill"></i>
                                                </button>
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

    {{-- <!-- Vertically centered Modal -->
    @foreach ($persyaratan as $per)
        <div class="modal fade" id="modalUbah{{ $per->id_persyaratan }}\" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Penyaluran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('persyaratan.update', $per->id_persyaratan) }}"
                            method="POST">
                            @csrf
                            @method('PUT') <!-- Menggunakan metode PUT untuk update -->

                            <div>
                                <label for="persyaratan" class="form-label">Persyaratan</label>
                                <input type="text" class="form-control @error('persyaratan') is-invalid @enderror"
                                    name="persyaratan" placeholder="Persyaratan" value="{{ $per->persyaratan }}">
                                @error('persyaratan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End Vertically centered Modal-->
    @endforeach --}}
    <!-- Vertically centered Modal -->
    @foreach ($persyaratan as $per)
        <div class="modal fade" id="modalUbah{{ $per->id_persyaratan }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Penyaluran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('persyaratan.update', $per->id_persyaratan) }}"
                            method="POST">
                            @csrf
                            @method('PUT') <!-- Using the PUT method for update -->

                            <!-- Add a hidden input for the id_persyaratan -->
                            <input type="hidden" name="id_persyaratan" value="{{ $per->id_persyaratan }}">

                            <div>
                                <label for="persyaratan" class="form-label">Persyaratan</label>
                                <input type="text" class="form-control @error('persyaratan') is-invalid @enderror"
                                    name="persyaratan" placeholder="Persyaratan" value="{{ $per->persyaratan }}">
                                @error('persyaratan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Vertically centered Modal-->
    @endforeach


    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Persyaratan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('persyaratan.store') }}" method="POST">
                        @csrf
                        <!-- Isian Form untuk Tambah Data -->

                        <div>
                            <label for="persyaratan" class="form-label">Persyaratan</label>
                            <input type="text" class="form-control @error('persyaratan') is-invalid @enderror"
                                name="persyaratan" placeholder="Persyaratan" value="{{ old('persyaratan') }}">
                            @error('persyaratan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Vertically centered Modal tambah-->

@endsection
