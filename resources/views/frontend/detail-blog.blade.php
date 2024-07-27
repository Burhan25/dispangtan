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
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/icofont.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/datepicker.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/title-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/card-detail-blog.css') }}">

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
                                        <li><a href="/client-paramedik">Paramedik Veteriner</a>
                                        </li>
                                        <li class="active"><a href="/judul-blog">Berita</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="get-quote">
                                <a href="/konsultasi" class="btn">Konsultasi</a>
                            </div>
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
                        <h2>{{ $blog->title }}</h2>
                        <ul class="bread-list">
                            <li><a href="/home">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
							<li class="active">Detail Berita</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Single News -->
    <section class="news-single section " style="margin-bottom: 10px">
        {{-- <div class="container ">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-main ">
                                <!-- News Head -->
                                <div class="news-head">
                                    @if ($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="#">
                                    @endif
                                </div>
                                <!-- News Title -->
                                <h1 class="news-title">{{ $blog->title }}</h1>
                                <!-- News Text -->
                                <div class="news-text">
                                    <p>{{ $blog->description }}</p>
                                </div>
                                <div class="blog-bottom"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar"></div>
                </div>
            </div>
        </div> --}}


        <div class="blog-container">
            <div class="blog-card">
                @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="#">
                @endif
                <div class="content">

                    <h2>{{ $blog->title }}</h2>
                    <p>{{ $blog->description }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Single News -->

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

    <!-- JS Files -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/niceselect.js') }}"></script>
    <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/finalcountdown.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('frontend/js/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/js/nice-select.js') }}"></script>
    <script src="{{ asset('frontend/js/countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/lightcase.js') }}"></script>
    <script src="{{ asset('frontend/js/isotop.min.js') }}"></script>
    <script src="{{ asset('frontend/js/breadcrumb.js') }}"></script>
    <script src="{{ asset('frontend/js/active.js') }}"></script>
</body>

</html>
