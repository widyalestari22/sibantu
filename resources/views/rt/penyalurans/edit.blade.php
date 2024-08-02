@extends('staffdesa.layouts.app')

@section('title', 'Edit Penerima Bantuan')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Daftar Penerima Bantuan</h5>

            <form class="row g-3" action="{{ route('penerima.update', $penerima->id_penerima) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- <div class="col-md-6">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori">
                        @foreach ($kategori as $category)
                            <option value="{{ $category->id_kategori }}"
                                {{ $category->id_kategori == $penerima->id_kategori ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="Nama Penerima" value="{{ $penerima->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        placeholder="Nomor Induk Kependudukan" value="{{ $penerima->nik }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        placeholder="Alamat" value="{{ $penerima->alamat }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="RT" class="form-label">RT</label>
                    <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt"
                        placeholder="rt" value="{{ $penerima->rt }}">
                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="RW" class="form-label">RW</label>
                    <input type="text" class="form-control @error('rw ') is-invalid @enderror" name="rw "
                        placeholder="rw " value="{{ $penerima->rw }}">
                    @error('rw ')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nama_desa" class="form-label">Nama Desa</label>
                    <input type="text" class="form-control @error('nama_desa') is-invalid @enderror" name="nama_desa"
                        placeholder="Nama Desa" value="{{ $penerima->nama_desa }}">
                    @error('nama_desa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                    <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror"
                        name="nama_kecamatan" placeholder="Nama Kecamatan" value="{{ $penerima->nama_kecamatan }}">
                    @error('nama_kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('staf.penerimaan') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

        </div>
    </div>

@endsection
