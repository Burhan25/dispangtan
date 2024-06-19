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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
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
    <link rel="stylesheet" href="{{ asset('frontendcss/owl-carousel.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/datepicker.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/card-paramedik.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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
                                        <li><a href="/home">Home</a></li>
                                        <li><a href="/client-panduan">Panduan</a></li>
                                        <li class="active"><a href="/paramedik">Paramedik Veteriner</a></li>
                                        <li><a href="/blog">Blog</a></li>
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
                        <h2>Layanan Konsultasi Paramedik Veteriner Kabupaten Sragen</h2>
                        <ul class="bread-list">
                            <li><a href="/home">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Paramedik Veteriner</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Dropdown for Kecamatan -->
    <div class="dropdown mt-3" style="justify-content: left; display: flex;">
        <form action="{{ route('admin.paramedik.list') }}" method="GET">
            <button class="dropdown-toggle btn btn-primary" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-map-marker-alt"></i> Pilih Kecamatan
            </button>
            <ul class="dropdown-menu w-10" aria-labelledby="dropdownMenuButton">
                @foreach ($kecamatan as $kec)
                    <li><button type="submit" name="kecamatan_id" value="{{ $kec->id }}"
                            class="dropdown-item">{{ $kec->name }}</button></li>
                @endforeach
            </ul>
        </form>
    </div>

    <div class="container-card">
        @foreach ($paramedik as $p)
            <div class="game-card">
                <div class="game-card-content">
                    <div class="game-card-image-container">
                        <img class="game-card-image" src="{{ asset('images/' . $p->foto) }}" alt="Gambar Game">
                    </div>
                    <div class="description">
                        <div class="game-title">
                            <h2 class="paramedik-name">{{ $p->nama }}</h2>
                            <p class="paramedik-info">{{ $p->profession }} ~ {{ $p->spesialis }}</p>
                        </div>
                        <div class="info">
                            <div class="info-item">
                                <i class="bi bi-house-fill" style="font-size: 2rem; padding-right: 20px"></i>
                                <div class="info-text">
                                    <span>Domisili</span>
                                    <p>{{ $p->domisiliId->nama }}</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-clipboard-heart-fill"
                                    style="font-size: 2rem; padding-right: 20px"></i>
                                <div class="info-text">
                                    <span>Nomor STR</span>
                                    <p>{{ $p->nomor_str }}</p>
                                </div>
                            </div>
                        </div>
                        <button class="game-card-button"
                            onclick="redirectToWhatsApp('{{ $p->phone }}')">Whatsapp</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        function selectKecamatan(id) {
            document.getElementById('kecamatanIdInput').value = id;
            document.getElementById('kecamatanForm').submit();
        }
    </script>
    <script>
        function redirectToWhatsApp(phoneNumber) {
            window.location.href = `https://wa.me/${phoneNumber}`;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>

</html>
