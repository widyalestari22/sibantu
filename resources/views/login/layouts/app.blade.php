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

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    {{-- <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ url('/logo/bengkalis.png') }}" alt="">
                <span class="d-none d-lg-block"> Desa <br>Air Putih</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div> -->
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ url('/logo/user.png') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Ini kasi User yang login</h6>
                            <span>Ini role dia apa</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header> --}}

    {{-- <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="/staf/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <!--Pengajuan BLT -->
            <li class="nav-item">
                <a class="nav-link " href="/staf/pengajuan">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Pengajuan BLT DD</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bi bi-clipboard2-data"></i>
                    <span>Penerima Bantuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bi bi-file-earmark-check"></i>
                    <span>Penyaluran Bantuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bi bi-file-ruled"></i>
                    <span>Persyaratan Pengajuan BLT DD</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bi bi-person-vcard"></i>
                    <span>Pengguna Sistem</span>
                </a>
            </li>
            <!-- akhir Pengajuan BLT -->


        </ul>

    </aside><!-- End Sidebar--> --}}

    <main>

        @yield('content')

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
    @yield('script')

</body>

</html>