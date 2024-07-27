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
    <title>Dispangtan Kabupaten Sragen</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/img/logo_srg.png') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <!-- File PDF CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/panduan.css') }}">

    <!-- Custom CSS -->

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
                        <div class="col-lg-3 col-md=3 col-12">
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
                                        <li class="active"><a href="/client-panduan">Panduan </a></li>
                                        <li>
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Layanan
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/client-paramedik">Paramedik
                                                        Veteriner</a></li>
                                                <li><a class="dropdown-item" href="/konsultasi">Konsultasi</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/judul-blog">Berita</a></li>
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
                        <h2>Panduan P3 (Pemeliharaan, Perawatan, dan Penanganan) Hewan</h2>
                        <ul class="bread-list">
                            <li><a href="/home">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="/panduan">Panduan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="CardsContainer">
        @foreach ($panduans as $panduan)
            <div class="card">
                <img src="{{ asset('frontend/img/img-panduan/pdf.png') }}" alt="PDF">
                <div class="card-title">{{ $panduan->title }}</div>
                <a href="{{ asset($panduan->file) }}" class="btn btn-thin" download>Download PDF</a>
                <button class="btn btn-primary" onclick="showPreview('{{ asset($panduan->file) }}')">Preview
                    PDF</button>
            </div>
        @endforeach
    </div>

    <!-- Modal for PDF preview -->
    <!-- Modal untuk Preview PDF -->
    <div id="pdfModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <iframe id="pdfFrame" src="" width="100%" height="500px"></iframe>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function showPreview(url) {
            document.getElementById('pdfFrame').src = url;
            document.getElementById('pdfModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('pdfModal').style.display = "none";
            document.getElementById('pdfFrame').src = ""; // Clear the iframe src to stop the PDF from loading
        }

        // Tutup modal saat mengklik di luar konten modal
        window.onclick = function(event) {
            const modal = document.getElementById('pdfModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
