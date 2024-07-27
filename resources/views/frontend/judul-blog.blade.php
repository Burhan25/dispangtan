<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dispangtan Kabupaten Sragen </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/img/logo_srg.png') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/title-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

</head>

<body>

    <!-- Header Area -->

    <header class="header">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5 col-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <!-- Start Logo -->
                            <div class="logo">
                                <a href="/home"><img src="{{ asset('frontend/img/logo.jpg') }}" alt="#"></a>
                            </div>
                            <!-- End Logo -->

                            <!-- Mobile Nav -->
                            <div class="mobile-nav"></div>
                            <!-- End Mobile Nav -->
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <!-- Main Menu -->
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a href="/home">Home</a>
                                        </li>
                                        <li><a href="/client-panduan">Panduan </a></li>
                                        <li>
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Layanan
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/client-paramedik">Paramedik Veteriner</a></li>
                                                <li><a class="dropdown-item" href="/konsultasi">Konsultasi</a></li>
                                            </ul>
                                        </li>
                                        <li class="active"><a href="/judul-blog">Berita</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!-- End Header Area -->

    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
                        <h2>Informasi Terkini Dinas Ketahanan Pangan, Pertanian Dan Perikanan Kabupaten Sragen</h2>
                        <ul class="bread-list">
                            <li><a href="/home">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Berita</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container-news">
        @foreach ($blogs as $blog)
            <div class="news-card">
                <a href="{{ route('detail-blog', $blog->id) }}" target="_blank">
                    <div class="news-content">
                        <h2>{{ $blog->title }}</h2>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Layanan</h2>
                            <p>- Konsultasi Hewan dengan Dokter</p>
                            <p>- Perawatan Paramedik Veteriner</p>
                            <p>- Panduan Praktis</p>
                            <p>- Laman Blog</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Sosial Media</h2>
                            <!-- Social -->
                            <ul class="social">
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-vimeo"></i></a></li>
                                <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                            </ul>
                            <!-- End Social -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Jam Operasional</h2>
                            <p>Dinas Ketahanan Pangan, Pertanian dan Perikanan beroperasi pada pukul:</p>
                            <ul class="time-sidual">
                                <li class="day">Senin - Kamis <span>07.30 - 16.00</span></li>
                                <li class="day">Jumat <span>07.30 - 14.30</span></li>
                                <li class="day">Sabtu - Minggu <span>Tutup</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Kritik & Saran</h2>
                            <p>Jika terdapat kritik dan saran dapat dikirimkan ke email pertanian@sragenkab.go.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
    </footer>
    <!--/ End Footer -->
</script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
