<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ url('/logo/bengkalis.png') }}" rel="icon">
    <link href="{{ url('/logo/bengkalis.png') }}" rel="apple-touch-icon">

    <title>@yield('title') - Bantuan Sosial</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('/css/tabler.min.css?1674944402') }}" rel="stylesheet" />
    <link href="{{ url('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet">

    <!-- Vendor JS Files -->
    <script src="{{ url('/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url('/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ url('/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('/assets/js/main.js') }}"></script>

    <style>
        /* Ganti warna latar belakang card dengan ID "merah" */
        #merah {
            background-color: skyblue;
            /* Warna merah */
            margin: 10px;
            /* Menambahkan margin */
            padding: 20px;
            /* Menambahkan padding */
            height: 100px;
            /* Memberikan tinggi 100px */
            display: flex;
            /* Menggunakan flexbox */
            justify-content: center;
            /* Pusatkan konten secara horizontal */
            align-items: center;
            /* Pusatkan konten secara vertikal */
            text-align: center;
            /* Pusatkan teks */
        }

        /* Ganti warna latar belakang card dengan ID "kuning" */
        #kuning {
            background-color: red;
            /* Warna kuning */
            margin: 10px;
            /* Menambahkan margin */
            padding: 20px;
            /* Menambahkan padding */
            height: 100px;
            /* Memberikan tinggi 100px */
            display: flex;
            /* Menggunakan flexbox */
            justify-content: center;
            /* Pusatkan konten secara horizontal */
            align-items: center;
            /* Pusatkan konten secara vertikal */
            text-align: center;
            /* Pusatkan teks */
        }

        #profil {
            background-color: rgba(21, 49, 72, 1);
            /* Warna biru muda menggunakan nilai RGB */
            /* atau
        background-color: lightblue; // Warna biru muda menggunakan nama warna */
            padding: 50px;
            /* Tambahkan padding sesuai kebutuhan */
        }

        #informasi {
            margin-top: 12px
        }

        #profil h5,
        #profil span {
            color: #FFFFFF;
            /* atau bisa juga menggunakan color: white; */
        }



        /* #beranda {
            background-color: rgba(21, 49, 72, 1);
        } */
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
    body {
        display: grid;
    }

    .customAlert {
        position: fixed;
        z-index: 1000;
        width: 60%;
        justify-self: center;
        display: grid;
        top: 5em;
    }

    #customAlert {
        display: none;
        Mengatur elemen menjadi tersembunyi secara default
    }
</style>

<body>

    @if (session('success'))
        <div class="alert alert-success customAlert fade show" role="alert" id="customAlert">
            <h4 class="alert-heading">Berhasil!</h4>
            <p>{{ session('success') }}</p>
            <hr>
        </div>
    @endif
    <div class="alert alert-success customAlert fade show" role="alert" id="customAlert">
        <h4 class="alert-heading" id="alertTitle"></h4>
        <p id="alertMessage"></p>
        <hr>
    </div>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ url('/logo/bengkalis.png') }}" alt="">
                <span class="d-none d-lg-block">Air Putih</span>
            </a>
            {{-- <i class="bi bi-list toggle-sidebar-btn"></i> --}}
        </div><!-- End Logo -->
        {{-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div> --}}
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->
                <li class="nav-item pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#beranda">
                        <p>Beranda</p>
                    </a>
                </li><!-- End Profile Nav -->
                <li class="nav-item pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#profil">
                        <p>Profil</p>
                    </a>
                </li><!-- End Profile Nav -->
                <li class="nav-item pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#informasi">
                        <p>Informasi</p>
                    </a>
                </li><!-- End Profile Nav -->
                <li class="nav-item pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/login">
                        <p>Login</p>
                    </a>
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <div class="card">

        <section id="beranda" class="section">
            <div class="row">
                <div class="container">
                    <h5 class="card-title">Beranda</h5>
                    <!-- Slides only carousel -->
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ url('/logo/roro.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div><!-- End Slides only carousel-->
                </div>
            </div>
        </section>
        <section id="profil" class="setcion">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ">
                        <h5>Sistem Penerimaan Bantuan Langsung Tunai Dana Desa</h5>
                        <span>Sistem ini merupakan sarana informasi untuk menampilkan informasi terkait
                            penerimaan bantuan langsung tunai dana desa Air Putih</span> <br>
                    </div>
                    <div class="col-md-4 offset-md-2">
                        <br>
                        <button type="button" class="btn btn-info " data-bs-toggle="modal"
                            data-bs-target="#modalTambah">Lihat Informasi Bantuan</button>
                    </div>
                </div>
            </div>
        </section>
        <section id="informasi" class="section">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jenis Bantuan Yang Tersedia :</h5>
                                        <p class="card-text">
                                            1. Bantuan Langsung Tunai Dana Desa <br>
                                            2. Bantuan Langsung Non Tunai <br>
                                            3. Program Keluarga Harapan
                                        </p>
                                        <h5 class="card-title">Daftar Pengumuman</h5>
                                        <!-- List group With badges -->
                                        <ul class="list-group">
                                            {{-- @if ($pengumuman->isEmpty())
                                                <li class="list-group-item">
                                                    Tidak ada pengumuman
                                                </li>
                                            @else --}}
                                            @foreach ($pengumuman as $pen)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $pen->judul }}
                                                    <span class="badge bg-primary rounded-pill">
                                                        <a href="{{ url('../pengumuman') . '/' . $pen->pengumuman }}"
                                                            class="text-white" target="_blank">Lihat File</a>
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul><!-- End List With badges -->
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body" id="merah">
                                        <h5 class="card-title">Jumlah Penerima BLT</h5>
                                        <p class="card-text">{{ number_format($total) }} Orang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body" id="kuning">
                                        <h5 class="card-title">Jumlah Penerima BLT</h5>
                                        <p class="card-text">{{ $jumlahPenerimaNotInPenyaluran }} Orang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer text-center" style="background-color: rgba(21, 49, 72, 1);  color: #ffffff;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Desa Air Putih</h5>
                        <p>Kantor Desa Air Putih</p>
                        <p>Jalan Panglima Minal Bengkalis, Riau</p>
                        <p>Kode Pos 28711</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Profil</h5>
                        <p>Desa Air Putih</p>
                        <p>Visi & Misi</p>
                        <p>Sejarah Desa</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Follow Us</h5>
                        <p>Penerima Bantuan</p>
                        <p>Pengajuan BLT DD</p>
                        <p>Penyaluran Bantuan</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Vertically centered Modal for NIK Input -->


    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masukkan Nomor Induk Kependudukan untuk melihat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="/home/cari" method="POST">
                        @csrf
                        <div>
                            <label for="nik" class="form-label">Masukkan NIK Penerima</label>
                            <input type="number" class="form-control" name="nik"
                                placeholder="Nomor Induk Kependudukan" value="">
                        </div>

                        <!-- Tambahan input lainnya sesuai kebutuhan -->

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Cari</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="nikMessage" value="{{ $message }}">
    {{-- <script>
        const nikMessage = document.querySelector('#nikMessage').value
        console.log(nikMessage)

        if (nikMessage !== '') {
            const alertMessage = document.querySelector('#customAlert')
            alertMessage.classList.add('show')

            const alertTitle = document.querySelector('#alertTitle')
            const alertDescription = document.querySelector('#alertMessage')
            alertDescription.innerText = nikMessage

            if (alertMessage.innerText.includes('BLT') || alertMessage.innerText.includes('PKH')) {
                alertTitle.innerText = 'Selamat!'
            } else {
                alertTitle.innerText = 'Maaf'
            }

            setTimeout(() => {
                alertMessage.classList.remove('show')
            }, 3000)
        }
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nikMessage = document.querySelector('#nikMessage').value;
            if (nikMessage !== '') {
                const alertMessage = document.querySelector('#customAlert');
                alertMessage.style.display = 'block'; // Menampilkan elemen

                const alertTitle = document.querySelector('#alertTitle');
                const alertDescription = document.querySelector('#alertMessage');
                alertDescription.innerText = nikMessage;

                if (nikMessage.includes('BLT') || nikMessage.includes('PKH')) {
                    alertTitle.innerText = 'Selamat!';
                } else {
                    alertTitle.innerText = 'Maaf';
                }
                setTimeout(() => {
                    alertMessage.style.display = 'none'; // Menyembunyikan elemen setelah beberapa detik
                }, 5500);
            }
        });
    </script>
    {{-- <script>
        window.onload = function() {
            var alertDiv = document.getElementById('customAlert');
            if (alertDiv) {
                alertDiv.style.display = 'block'; // Menampilkan elemen jika ada pesan sesi
                setTimeout(function() {
                    alertDiv.style.display = 'none'; // Menyembunyikan elemen setelah 2 detik
                }, 2000); // 2000 milidetik = 2 detik
            }
        };
    </script> --}}
</body>

</html>
