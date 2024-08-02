@extends('staffdesa.layouts.app')

@section('title', 'Edit Penerima Bantuan')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Daftar Penerima Bantuan</h5>


            <form class="row g-3" action="{{ route('pengajuan.staf.update', $pengajuan->id_pengajuan) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="Nama Penerima" value="{{ $pengajuan->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        placeholder="Nomor Induk Kependudukan" value="{{ $pengajuan->nik }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error('kelamin') is-invalid @enderror" name="kelamin">
                        <option value="" selected disabled>Pilih Jenis kelamin</option>
                        <option value="Laki-laki" {{ $pengajuan->kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan" {{ $pengajuan->kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    @error('kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        placeholder="Alamat" value="{{ $pengajuan->alamat }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt"
                        placeholder="rt" value="{{ $pengajuan->rt }}">
                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="rw" class="form-label">RW</label>
                    <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw"
                        placeholder="rw" value="{{ $pengajuan->rw }}">
                    @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tanggungan" class="form-label">Jumlah Tanggungan</label>
                    <input type="number" class="form-control @error('tanggungan') is-invalid @enderror" name="tanggungan"
                        placeholder="tanggungan" value="{{ old('tanggungan', $pengajuan->tanggungan) }}">
                    @error('tanggungan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tanah" class="form-label">Ukuran Tanah</label>
                    <div class="row">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" class="form-control @error('tanah') is-invalid @enderror"
                                    id="tanah" name="tanah" placeholder="Masukkan luas tanah"
                                    value="{{ old('tanah', $pengajuan->tanah) }}">
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
                        name="tanggal_lahir" value="{{ old('tanggal_lahir', $pengajuan->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="penghasilan" class="form-label">Penghasilan</label>
                    <div class="form-check">
                        <input class="form-check-input @error('penghasilan') is-invalid @enderror" type="radio"
                            name="penghasilan" id="kurang_dari_1juta" value="Kurang dari Rp 1.000.000"
                            {{ $pengajuan->penghasilan == 'Kurang dari Rp 1.000.000' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kurang_dari_1juta">
                            Kurang dari Rp 1.000.000
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('penghasilan') is-invalid @enderror" type="radio"
                            name="penghasilan" id="1juta_5juta" value="Rp 1.000.000 - Rp 5.000.000"
                            {{ $pengajuan->penghasilan == 'Rp 1.000.000 - Rp 5.000.000' ? 'checked' : '' }}>
                        <label class="form-check-label" for="1juta_5juta">
                            Rp 1.000.000 - Rp 5.000.000
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('penghasilan') is-invalid @enderror" type="radio"
                            name="penghasilan" id="lebih_dari_5juta" value="Lebih dari Rp 5.000.000"
                            {{ $pengajuan->penghasilan == 'Lebih dari Rp 5.000.000' ? 'checked' : '' }}>
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
                            {{ $pengajuan->tanpa_bantuan == 'Ya' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bantuan_ya">
                            Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('tanpa_bantuan') is-invalid @enderror" type="radio"
                            name="tanpa_bantuan" id="tanpa_bantuan_tidak" value="Tidak"
                            {{ $pengajuan->tanpa_bantuan == 'Tidak' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bantuan_tidak">
                            Tidak
                        </label>
                    </div>
                    @error('tanpa_bantuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <legend class="col-form-label">Kepemilikan Elekronik</legend>
                    <div class="row">
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Handphone" name="elektronik[]"
                                value="Handphone" @if (in_array('Handphone', old('elektronik', explode(',', $pengajuan->elektronik)))) checked @endif>
                            <label class="form-check-label" for="Handphone">Handphone</label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Kulkas" name="elektronik[]"
                                value="Kulkas" @if (in_array('Kulkas', old('elektronik', explode(',', $pengajuan->elektronik)))) checked @endif>
                            <label class="form-check-label" for="Kulkas">
                                Kulkas
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Laptop" name="elektronik[]"
                                value="Laptop" @if (in_array('Laptop', old('elektronik', explode(',', $pengajuan->elektronik)))) checked @endif>
                            <label class="form-check-label" for="Laptop">
                                Laptop
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Mesin Cuci" name="elektronik[]"
                                value="Mesin Cuci" @if (in_array('Mesin Cuci', old('elektronik', explode(',', $pengajuan->elektronik)))) checked @endif>
                            <label class="form-check-label" for="Mesin Cuci">
                                Mesin Cuci
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Komputer" name="elektronik[]"
                                value="Komputer" @if (in_array('Komputer', old('elektronik', explode(',', $pengajuan->elektronik)))) checked @endif>
                            <label class="form-check-label" for="Komputer">
                                Komputer
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" id="Televisi" name="elektronik[]"
                                value="Televisi" @if (in_array('Televisi', old('elektronik', explode(',', $pengajuan->elektronik)))) checked @endif>
                            <label class="form-check-label" for="Televisi">
                                Televisi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="kk" class="form-label">Kartu Tanda Penduduk</label>
                    <div class="col-sm-12">
                        <input class="form-control @error('kk') is-invalid @enderror" type="file" id="kk"
                            name="kk">
                        @error('kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($pengajuan->kk)
                        <p>File KK Sebelumnya: <a href="{{ asset('galeri/' . $pengajuan->kk) }}"
                                target="_blank">{{ $pengajuan->kk }}</a></p>
                    @endif
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
                    @if ($pengajuan->ktp)
                        <p>File KTP Sebelumnya: <a href="{{ asset('galeri/' . $pengajuan->ktp) }}"
                                target="_blank">{{ $pengajuan->ktp }}</a></p>
                    @endif
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
                    @if ($pengajuan->rumah)
                        <p>File rumah Sebelumnya: <a href="{{ asset('galeri/' . $pengajuan->rumah) }}"
                                target="_blank">{{ $pengajuan->rumah }}</a></p>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label">Validasi</label>
                    <select class="form-select @error('validasi') is-invalid @enderror" name="validasi">
                        <option value="Pengajuan Di Terima"
                            {{ $pengajuan->validasi == 'Pengajuan Di Terima' ? 'selected' : '' }}>
                            Pengajuan Di Terima</option>
                        <option value="Pengajuan Di Tolak"
                            {{ $pengajuan->validasi == 'Pengajuan Di Tolak' ? 'selected' : '' }}>
                            Pengajuan Di Tolak</option>
                        <option value="Progres Pengajuan"
                            {{ $pengajuan->validasi == 'Progres Pengajuan' ? 'selected' : '' }}>Progres Pengajuan</option>
                    </select>
                    @error('validasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>



        </div>
    </div>

@endsection
