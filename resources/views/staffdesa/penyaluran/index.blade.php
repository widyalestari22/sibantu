@extends('staffdesa.layouts.app')

@section('title', 'Penyaluran Bantuan BLT DD')
@section('content')
    <div class="pagetitle">
        <h1>Penyaluran Bantuan BLT DD</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staf/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Penyaluran Bantuan Langsung Tunai Dana Desa</li>
            </ol>
        </nav>
        {{-- <a href="{{ route('penyaluran.create') }}"> <button type="button"
                class="btn btn-primary rounded-pill">Tambah</button></a> --}}

        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah
        </button>
        <div class="card-body">
            <h5 class="card-title">Cetak Laporan</h5>
            <a href="/staf/penyaluran/cetak" target="_blank"> <button type="button" class="btn btn-success"><i
                        class="bi bi-check-circle"></i></button></a>
            <a href="/staf/penyaluran/cetak/belum" target="_blank"><button type="button" class="btn btn-danger"><i
                        class="bi bi-exclamation-octagon"></i></button> </a>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>NIK</th>
                                    <th>Nama Penerima</th>
                                    <th>Tanggal Penyaluran</th>
                                    <th>Jumlah Bantuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyaluran as $pen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($pen->penerima)
                                                {{ $pen->penerima->nik }}
                                            @else
                                                Data Nik Penerima tidak tersedia
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pen->penerima)
                                                {{ $pen->penerima->nama }}
                                            @else
                                                Nama penerima tidak tersedia
                                            @endif
                                        </td>
                                        <td>{{ $pen->tanggal_penyaluran }}</td>
                                        <td>{{ $pen->jumlah_bantuan }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalUbah{{ $pen->id_penyaluran }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <a href="{{ route('penyaluran.destroy', ['id' => $pen->id_penyaluran]) }}"
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
                    </div>
                </div>
            </div>

            <!-- Vertically centered Modal -->
            @foreach ($penyaluran as $pen)
                <div class="modal fade" id="modalUbah{{ $pen->id_penyaluran }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data Penyaluran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" action="{{ route('penyaluran.update', $pen->id_penyaluran) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT') <!-- Menggunakan metode PUT untuk update -->
                                    <div>
                                        <label for="id_penerima" class="form-label">Pilih Penerima</label>
                                        <select name="id_penerima" class="form-select" id="id_penerima">
                                            <option value="">Pilih Nama</option>
                                            @foreach ($penerima as $penerimaItem)
                                                <!-- Ganti variabel iterasi menjadi $penerimaItem -->
                                                <option value="{{ $penerimaItem->id_penerima }}"
                                                    @if ($penerimaItem->id_penerima == $pen->id_penerima) selected @endif>
                                                    {{ $penerimaItem->nama }}</option>
                                                <!-- Ganti 'nama_kategori' dengan kolom yang sesuai di tabel 'categories' -->
                                            @endforeach
                                        </select>
                                        @error('id_penerima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --

                                    <div>
                                        <label for="jumlah_bantuan" class="form-label">Jumlah Bantuan</label>
                                        <input type="number"
                                            class="form-control @error('jumlah_bantuan') is-invalid @enderror"
                                            name="jumlah_bantuan" placeholder="Jumlah Bantuan"
                                            value="{{ $pen->jumlah_bantuan }}">
                                        @error('jumlah_bantuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="tanggal_penyaluran" value="{{ $pen->tanggal_penyaluran }}">

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- End Vertically centered Modal-->
            @endforeach
            <!-- Vertically centered Modal tambah-->
            <!-- Tombol untuk membuka modal -->


            <!-- Modal Tambah Data -->
            <div class="modal fade" id="modalTambah" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Penyaluran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="{{ route('penyaluran.store') }}" method="POST">
                                @csrf
                                <!-- Isian Form untuk Tambah Data -->
                                <div>
                                    <label for="id_penerima" class="form-label">Pilih Penerima</label>
                                    <select name="id_penerima" class="form-select" id="id_penerima">
                                        <option value="">Pilih Nama</option>
                                        @foreach ($penerima as $penerimaItem)
                                            <option value="{{ $penerimaItem->id_penerima }}">{{ $penerimaItem->nama }}
                                            </option>
                                            <!-- Ganti 'nama_kategori' dengan kolom yang sesuai di tabel 'categories' -->
                                        @endforeach
                                    </select>
                                    @error('id_penerima')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_bantuan" class="form-label">Jumlah Bantuan</label>
                                    <input type="number"
                                        class="form-control @error('jumlah_bantuan') is-invalid @enderror"
                                        name="jumlah_bantuan" placeholder="Jumlah Bantuan"
                                        value="{{ old('jumlah_bantuan') }}">
                                    @error('jumlah_bantuan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tambahkan kolom lainnya sesuai kebutuhan -->

                                <input type="hidden" name="tanggal_penyaluran" value="{{ now() }}">

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Vertically centered Modal tambah-->


        </div>
    </section>

    <script>
        < script src = "https://code.jquery.com/jquery-3.6.0.min.js" >
    </script>



@endsection
