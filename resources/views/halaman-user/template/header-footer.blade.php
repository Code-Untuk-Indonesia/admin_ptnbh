<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/62e7967129.js" crossorigin="anonymous"></script>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- aos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link rel="stylesheet" href="{{ asset('/ptnbh3/style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/ptnbh3/style/responsive.css') }}">
    <title>PTNBH Universitas Tanjungpura</title>
    <link rel="icon" href="{{ asset('ptnbh3/asset/Universitas_Tanjungpura_Pontianak.webp') }}" type="image/gif"
        sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top"
        style="padding-top: 8px; padding-bottom: 8px; background-color: #084263; color: #ffff">
        <div class="container">
            <a class="navbar-brand" href="/" style="color: #ffff">
                <img src="{{ asset('ptnbh3/asset/MENUJU Panah.png') }}" alt="logo"
                    class="d-inline-block align-text-top me-2 img-nav">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/"> {{ app()->getLocale() == 'id' ? 'Beranda' : 'Home' }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button">
                            {{ app()->getLocale() == 'id' ? 'Tentang' : 'About' }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="/tentang-ptnbh">Profil</a></li>
                            <li><a class="dropdown-item" href="/organisasi">Organisasi</a></li>
                            <li><a class="dropdown-item" href="/gallery">
                                    {{ app()->getLocale() == 'id' ? 'Galeri' : 'Gallery' }}</a></li>
                            <li><a class="dropdown-item" href="/agenda-ptnbh">Agenda</a></li>
                            <li><a class="dropdown-item" href="/pengumuman-ptnbh">Pengumuman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button">
                            Lembaga
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li><a class="dropdown-item" href="/unit-bisnis">Unit Bisnis</a></li>
                            <li><a class="dropdown-item" href="/fakultas">Fakultas</a></li>
                            <li><a class="dropdown-item" href="/mahasiswa">Mahasiswa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/berita-ptnbh">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kontak">Kontak</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button">
                            <img src="{{ app()->getLocale() == 'id' ? asset('ptnbh3/asset/Indonesia.png') : asset('ptnbh3/asset/Uk.png') }}"
                                alt="" class="flag-img">
                            {{ app()->getLocale() == 'id' ? 'Indonesia' : 'English' }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li>
                                <a class="dropdown-item" href="{{ url('language/id') }}">
                                    <img src="{{ asset('ptnbh3/asset/Indonesia.png') }}" alt=""
                                        class="flag-img"> Indonesia
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('language/en') }}">
                                    <img src="{{ asset('ptnbh3/asset/Uk.png') }}" alt="" class="flag-img">
                                    English
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- Hero Section -->
    @if (!Request::is('/'))
        <section class="hero-profile" style="background-image: url(@yield('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))); ">

            <h1 class="profile-1"><span style="color: #ffea00;">|</span> @yield('hero-title', 'Universitas Tanjungpura')</h1>

        </section>
    @endif
    <!-- End Hero Section -->

    @yield('content')

    <!-- footer -->
    {{-- <footer class="footer-area">
        <div class="footer-big">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="footer-widget">
                            <div class="widget-about">
                                <img src="{{ asset('ptnbh3/asset/Universitas_Tanjungpura_Pontianak.webp') }}"
                                    alt="" class="img-foot">
                                <p>UNIVERSITAS TANJUNGPURA
                                    “Membangun Ekosistem Digital Menuju Universitas Siber”</p>
                            </div>
                        </div>
                    </div>
                    @foreach (App\Models\Footer::all()->chunk(5) as $chunk)
                        <div class="col-md-3 col-sm-4">
                            <div class="footer-widget">
                                <div class="footer-menu">
                                    <h4 class="footer-widget-title">Layanan Informasi</h4>
                                    <ul>
                                        @foreach ($chunk as $footer)
                                            <li>
                                                <a href="{{ $footer->url }}">{{ $footer->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>© PTNBH Universitas Tanjungpura</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}

    <!-- end footer -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <img src="{{ asset('ptnbh3/asset/Universitas_Tanjungpura_Pontianak.webp') }}" alt=""
                        class="img-foot mb-3">
                    <h4>Universitas Tanjungpura</h4>
                    <p>Memperkuat Ekosistem Inovasi dan Kolaborasi</p>
                    <p>Mewujudkan Untan yang Berdaya Saing</p>
                    <p>Menuju World Class University </p>

                </div>
                @foreach (App\Models\Footer::all()->chunk(5) as $chunk)
                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Layanan Informasi</h4>
                        <ul>
                            @foreach ($chunk as $footer)
                                <li><a href="{{ $footer->url }}">{{ $footer->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach



            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Untan</span></strong>. 2024
            </div>

        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="{{ asset('ptnbh3/script/index.js') }}"></script>
</body>

</html>
