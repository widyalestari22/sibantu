@extends('rt.layouts.app')

@section('title, Tambah Penerima Bantuan')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Daftar Pengajuan Bantuan BLT DD</h5>

            {{-- <form class="row g-3" action="{{ route('pengajuan.rt.store') }}" method="POST"> --}}
            <form class="row g-3" action="{{ route('pengajuan.rt.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="Nama Penerima" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error('kelamin') is-invalid @enderror" name="kelamin">
                        <option value="" selected disabled>Pilih Jenis kelamin</option>
                        <option value="Laki-laki" {{ old('kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>

                    </select>
                    @error('kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        placeholder="Alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="RT" class="form-label">RT</label>
                    <input type="number" class="form-control @error('rt') is-invalid @enderror" name="rt"
                        placeholder="rt" value="{{ old('rt') }}">
                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="RW" class="form-label">RW</label>
                    <input type="number" class="form-control @error('rw') is-invalid @enderror" name="rw"
                        placeholder="rw" value="{{ old('rw') }}">
                    @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="rw" class="form-label">Jumlah Tanggungan</label>
                    <input type="number" class="form-control @error('tanggungan') is-invalid @enderror" name="tanggungan"
                        placeholder="tanggungan" value="{{ old('tanggungan') }}">
                    @error('tanggungan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <legend class="form-label">Ukuran Tanah</legend>
                    <div class="row">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" class="form-control @error('tanah') is-invalid @enderror"
                                    id="tanah" name="tanah" placeholder="Masukkan luas tanah"
                                    value="{{ old('tanah') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">m²</span>
                                </div>
                            </div>
                            @error('tanah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                {{-- <div class="col-md-6">
                    <label for="nama_desa" class="form-label">Nama Desa</label>
                    <input type="text" class="form-control @error('nama_desa') is-invalid @enderror" name="nama_desa"
                        placeholder="Nama Desa" value="{{ old('nama_desa') }}">
                    @error('nama_desa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                    <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror"
                        name="nama_kecamatan" placeholder="Nama Kecamatan" value="{{ old('nama_kecamatan') }}">
                    @error('nama_kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="col-md-6">
                    <label for="penghasilan" class="form-label">Penghasilan</label>
                    <div class="form-check">
                        <input class="form-check-input @error('penghasilan') is-invalid @enderror" type="radio"
                            name="penghasilan" id="kurang_dari_1juta" value="Kurang dari Rp 1.000.000"
                            {{ old('penghasilan') == 'Kurang dari Rp 1.000.000' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kurang_dari_1juta">
                            Kurang dari Rp 1.000.000
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('penghasilan') is-invalid @enderror" type="radio"
                            name="penghasilan" id="1juta_5juta" value="Rp 1.000.000 - Rp 5.000.000"
                            {{ old('penghasilan') == 'Rp 1.000.000 - Rp 5.000.000' ? 'checked' : '' }}>
                        <label class="form-check-label" for="1juta_5juta">
                            Rp 1.000.000 - Rp 5.000.000
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('penghasilan') is-invalid @enderror" type="radio"
                            name="penghasilan" id="lebih_dari_5juta" value="Lebih dari Rp 5.000.000"
                            {{ old('penghasilan') == 'Lebih dari Rp 5.000.000' ? 'checked' : '' }}>
                        <label class="form-check-label" for="lebih_dari_5juta">
                            Lebih dari Rp 5.000.000
                        </label>
                    </div>
                    @error('penghasilan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Mendapatkan Bantuan dari Instansi Lain?</label>
                    <div class="form-check">
                        <input class="form-check-input @error('tanpa_bantuan') is-invalid @enderror" type="radio"
                            name="tanpa_bantuan" id="tanpa_bantuan_ya" value="Ya"
                            {{ old('tanpa_bantuan') == 'Ya' ? 'checked' : '' }}>
                        <label class="form-check-label" for="tanpa_bantuan_ya">Ya</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('tanpa_bantuan') is-invalid @enderror" type="radio"
                            name="tanpa_bantuan" id="tanpa_bantuan_tidak" value="Tidak"
                            {{ old('tanpa_bantuan') == 'Tidak' ? 'checked' : '' }}>
                        <label class="form-check-label" for="tanpa_bantuan_tidak">Tidak</label>
                    </div>
                    @error('bantuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <legend class="col-form-label">Kepemilikan Elekronik</legend>
                    <div class="row">
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Handphone" name="elektronik[]"
                                value="Handphone" @if (old('elektronik') && in_array('Handphone', old('elektronik'))) checked @endif>
                            <label class="form-check-label" for="Handphone">Handphone</label>

                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Kulkas" name="elektronik[]"
                                value="Kulkas" @if (old('elektronik') && in_array('Kulkas', old('elektronik'))) checked @endif>
                            <label class="form-check-label" for="Kulkas">
                                Kulkas
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Laptop" name="elektronik[]"
                                value="Laptop" @if (old('elektronik') && in_array('Laptop', old('elektronik'))) checked @endif>
                            <label class="form-check-label" for="Laptop">
                                Laptop
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Mesin Cuci" name="elektronik[]"
                                value="Mesin Cuci" @if (old('elektronik') && in_array('Mesin Cuci', old('elektronik'))) checked @endif>
                            <label class="form-check-label" for="Mesin Cuci">
                                Mesin Cuci
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Komputer" name="elektronik[]"
                                value="Komputer" @if (old('elektronik') && in_array('Komputer', old('elektronik'))) checked @endif>
                            <label class="form-check-label" for="Komputer">
                                Komputer
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Televisi" name="elektronik[]"
                                value="Televisi" @if (old('elektronik') && in_array('Televisi', old('elektronik'))) checked @endif>
                            <label class="form-check-label" for="Televisi">
                                Televisi
                            </label>
                        </div>
                    </div>
                </div>


                {{-- <div class="col-md-6">
                    <legend class="col-form-label">Checkboxes</legend>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                Example checkbox
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck2" checked="">
                            <label class="form-check-label" for="gridCheck2">
                                Example checkbox 2
                            </label>
                        </div>

                    </div>
                </div> --}}
                <div class="col-md-6">
                    <label for="kk" class="form-label">Kartu Tanda Penduduk</label>
                    <div class="col-sm-12">
                        <input class="form-control @error('kk') is-invalid @enderror" type="file" id="kk"
                            name="kk">
                        @error('kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="ktp" class="form-label">Kartu Keluarga</label>
                    <div class="col-sm-12">
                        <input class="form-control @error('ktp') is-invalid @enderror" type="file" id="ktp"
                            name="ktp">
                        @error('ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="rumah" class="form-label">Tampak Rumah</label>
                    <div class="col-sm-12">
                        <input class="form-control @error('rumah') is-invalid @enderror" type="file" id="rumah"
                            name="rumah">
                        @error('rumah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </form>


        </div>
    </div>


@endsection
