@extends('staffdesa.layouts.app')

@section('title', 'Pengajuan')
@section('content')
    <div class="pagetitle">
        <h1>Pengajuan BLT DD</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan Bantuan Langsung Tunai Dana Desa</li>
            </ol>
        </nav>
        {{-- <a href="/staf/pengajuan/create"> <button type="button" class="btn btn-primary rounded-pill">Tambah</button></a> --}}
        <a href="/staf/pengajuan/cetak" target="_blank"> <button type="button"
                class="btn btn-success rounded-pill">Cetak</button></a>
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
                                    {{-- <th scope="col">Alamat</th> --}}
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Bantuan Lain</th>
                                    <th scope="col">Penghasilan</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan as $juan)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td> {{ $juan->nama }} </td>
                                        <td>{{ $juan->nik }}</td>
                                        {{-- <td>{{ $juan->alamat }} </td> --}}
                                        <td>{{ $juan->kelamin }}</td>
                                        <td>{{ $juan->tanpa_bantuan }}</td>
                                        <td>{{ $juan->penghasilan }}</td>
                                        <td>{{ $juan->validasi }}</td>
                                        <td>
                                            <a href="{{ route('staff.pengajuan.detail', ['id' => $juan->id_pengajuan]) }}">
                                                <button type="button" class="btn btn-info"><i
                                                        class="bi bi-eye-fill"></i></i></button>
                                            </a>
                                            <a href="{{ route('pengajuan.staf.edit', ['id' => $juan->id_pengajuan]) }}">
                                                <button type="button" class="btn btn-warning"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </a>
                                            <a href="{{ route('pengajuan.staf.destroy', ['id' => $juan->id_pengajuan]) }}"
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
    <script>
        setTimeout(function() {
            $(".alert").fadeOut('fast');
        }, 3000);

        // Konfigurasi Toastr.js (Anda dapat menyesuaikan sesuai kebutuhan)
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right', // Atur posisi toast
            showMethod: 'slideDown', // Animasi tampilan toast
            timeOut: 3000, // Waktu tampilan toast (dalam milidetik)
        };

        // Fungsi untuk menampilkan toaster
        function showToaster(status) {
            // Tampilkan toaster dengan pesan sukses

            if (status === true) {
                toastr.success('Status diubah menjadi "Tervalidasi"', 'Merubah Status');
            } else {
                toastr.success('Status diubah menjadi "Belum Tervalidasi"', 'Merubah Status');
            }
        }

        // Mendengarkan perubahan pada elemen <select> dengan class "status-select"
        var selectElements = document.querySelectorAll('.status-select');
        selectElements.forEach(function(selectElement) {
            selectElement.addEventListener('change', function() {
                var validasi = this.value;
                var idPengajuan = this.getAttribute('data-id');

                // Kirim permintaan AJAX ke server untuk menyimpan perubahan status
                var xhr = new XMLHttpRequest();
                xhr.open('POST', `/staf/pengajuan/update-status`, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Tampilkan pesan atau melakukan tindakan lain jika berhasil
                            console.log('Status berhasil diperbarui');

                            // Memeriksa nilai "status" dalam respons
                            var response = JSON.parse(xhr.responseText);
                            var status = response.status;

                            if (status === 'tervalidasi') {
                                console.log('Status: Tervalidasi');
                                showToaster(true);
                                window.location.reload();
                                // Lakukan tindakan yang sesuai jika status adalah "tervalidasi"
                            } else if (status === 'belum tervalidasi') {
                                console.log('Status: Belum Tervalidasi');
                                showToaster(false);
                                window.location.reload();
                                // Lakukan tindakan yang sesuai jika status adalah "belum tervalidasi"
                            } else {
                                console.error('Status tidak dikenali dalam respons.');
                            }
                        } else {
                            // Handle kesalahan jika diperlukan
                            console.error('Terjadi kesalahan saat mengirim permintaan.');
                        }
                    }
                };

                // Kirim data ke server
                var formData = 'id_pengajuan=' + idPengajuan + '&validasi=' + validasi;
                xhr.send(formData);
            });
        });
    </script>


@endsection
