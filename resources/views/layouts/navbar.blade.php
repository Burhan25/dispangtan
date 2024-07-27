
<header class="header">
       
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-2">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="/home"><img src="{{ asset('frontend/img/logo.jpg') }}" alt="#"></a>
                        </div>
                        <!-- End Logo -->

                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div class="flex justify-center col-lg-6 col-md-9 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li><a href="/home">Home</a></li>
                                    <li><a href="/client-panduan">Panduan</a></li>
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
                                    <li><a href="/judul-blog">Berita</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    <div class="col-lg-4">
                        <div class="flex justify-end items-center gap-2 get-quote">
                            @auth
                                <form action="{{ route('logout') }}" method="POST" id="logout">
                                    @csrf
                                </form>
                                <i class="fas fa-user-circle fa-2x" style="color: green;"></i>
                                <h1>{{ Auth::user()->name }}</h1>
                                <a class="btn cursor-pointer text-white" onclick="logout()">LOGOUT</a>
                            @endauth
                            @guest
                                <a href="/konsultasi" class="btn cursor-pointer text-white">Konsultasi</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/ End Header Inner -->
</header>