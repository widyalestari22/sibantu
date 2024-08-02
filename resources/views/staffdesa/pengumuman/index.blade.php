@extends('staffdesa.layouts.app')

@section('title', 'Persyaratan')
@section('content')
    <div class="pagetitle">
        <h1>Pengumuman Penyaluran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.dashboard">Home</a></li>
                <li class="breadcrumb-item active">Pengumuman Penyaluran</li>
            </ol>
        </nav>
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
                                    <th scope="col">Judul Pengumuman</th>
                                    <th scope="col">File Pengumuman</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Di Buat Pada</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengumuman as $pen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pen->judul }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($pen->pengumuman, 15, '') }}</td>
                                        {{-- <td>{{ $pen->pengumuman }}</td> --}}
                                        <td>{{ $pen->status }}</td>
                                        <td>{{ $pen->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalUbah{{ $pen->id_pengumuman }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <a href="{{ route('pengumuman.destroy', ['id' => $pen->id_pengumuman]) }}"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
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



    @foreach ($pengumuman as $pen)
        <div class="modal fade" id="modalUbah{{ $pen->id_pengumuman }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Penyaluran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('pengumuman.update', $pen->id_pengumuman) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Using the PUT method for update -->

                            <!-- Add a hidden input for the id_pengumuman -->
                            <input type="hidden" name="id_pengumuman" value="{{ $pen->id_pengumuman }}">

                            {{-- <div>
                                <label for="pengumuman" class="form-label">pengumuman</label>
                                <input type="file" class="form-control @error('pengumuman') is-invalid @enderror"
                                    name="pengumuman" accept=".pdf">
                                @error('pengumuman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div>
                                <label for="pengumuman" class="form-label">pengumuman</label>
                                <input type="file" class="form-control @error('pengumuman') is-invalid @enderror"
                                    name="pengumuman" accept=".pdf">
                                @error('pengumuman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tampilkan file lama -->
                            <div>
                                <label for="old_pengumuman" class="form-label">File Lama</label>
                                <p>{{ $pen->pengumuman }}</p>
                                <input type="hidden" name="old_pengumuman" value="{{ $pen->pengumuman }}">
                            </div>
                            <div>
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" placeholder="judul" id="judul" value="{{ $pen->judul }}">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="form-label">status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="" selected disabled>Pilih Status</option>
                                    <option value="Aktif" {{ $pen->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $pen->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak
                                        Aktif</option>
                                </select>
                                @error('status')
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
                    <form class="row g-3" action="{{ route('pengumuman.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                name="judul" placeholder="judul" id="judul" value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="pengumuman" class="form-label">pengumuman</label>
                            <input type="file" class="form-control @error('pengumuman') is-invalid @enderror"
                                name="pengumuman" placeholder="pengumuman" value="{{ old('pengumuman') }}">
                            @error('pengumuman')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div>
                            <label for="status" class="form-label">Jenis status</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status">
                                <option value="" selected disabled>Pilih Jenis status</option>
                                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>
                                    Tidak Aktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
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
