<!doctype html>
<html lang="en">

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

    <link rel="stylesheet" href="{{ asset('/ptnbh/style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/ptnbh/style/responsive.css') }}">
    <title>PTNBH Universitas Tanjungpura</title>
    <link rel="icon" href="{{ asset('ptnbh/asset/Universitas_Tanjungpura_Pontianak.webp') }}" type="image/gif"
        sizes="16x16">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('ptnbh/asset/Universitas_Tanjungpura_Pontianak.webp') }}" alt="logo"
                    width="30" height="30" class="d-inline-block align-text-top me-2">Universitas Tanjungpura
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tentang
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="/tentang-ptnbh">Profil</a></li>
                            <li><a class="dropdown-item" href="/organisasi">Organisasi</a></li>
                            <li><a class="dropdown-item" href="/gallery">Galeri</a></li>
                            <li><a class="dropdown-item" href="/agenda-ptnbh">Agenda</a></li>
                            <li><a class="dropdown-item" href="/pengumuman-ptnbh">Pengumuman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('ptnbh/asset/Indonesia.png') }}" alt="" class="flag-img">
                            Indonesia
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="#"><img
                                        src="{{ asset('ptnbh/asset/Indonesia.png') }}" alt=""
                                        class="flag-img"> Indonesia</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><img src="{{ asset('ptnbh/asset/Uk.png') }}"
                                        alt="" class="flag-img">English</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    @yield('content')

    <!-- footer -->
    {{-- <footer class="footer">
        <div class="container row">
            <div class="footer-col">
                <h4>Universitas Tanjungpura</h4>
                <ul>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Informasi Pilihan</h4>
                <ul>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Informasi Pilihan</h4>
                <ul>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                    <li><a href="">lorem</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Find Us On</h4>
                <div class="social-links">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                    </di>
                </div>
            </div>
    </footer> --}}
    <footer class="footer-area footer--light">
        <div class="footer-big">
          <!-- start .container -->
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-12">
                <div class="footer-widget">
                  <div class="widget-about">
                    <img src="{{asset('ptnbh/asset/Universitas_Tanjungpura_Pontianak.webp')}}" alt="" class="img-foot">
                    <p>UNIVERSITAS TANJUNGPURA
                        “Membangun Ekosistem Digital Menuju Universitas Siber”</p>

                  </div>
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- end /.col-md-4 -->
              <div class="col-md-3 col-sm-4">
                <div class="footer-widget">
                  <div class="footer-menu footer-menu--1">
                    <h4 class="footer-widget-title">Popular Category</h4>
                    <ul>
                      <li>
                        <a href="#">Wordpress</a>
                      </li>
                      <li>
                        <a href="#">Plugins</a>
                      </li>
                      <li>
                        <a href="#">Joomla Template</a>
                      </li>
                      <li>
                        <a href="#">Admin Template</a>
                      </li>
                      <li>
                        <a href="#">HTML Template</a>
                      </li>
                    </ul>
                  </div>
                  <!-- end /.footer-menu -->
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- end /.col-md-3 -->

              <div class="col-md-3 col-sm-4">
                <div class="footer-widget">
                  <div class="footer-menu">
                    <h4 class="footer-widget-title">Layanan Informasi</h4>
                    <ul>
                      <li>
                        <a href="#">About Us</a>
                      </li>
                      <li>
                        <a href="#">How It Works</a>
                      </li>
                      <li>
                        <a href="#">Affiliates</a>
                      </li>
                      <li>
                        <a href="#">Testimonials</a>
                      </li>
                      <li>
                        <a href="#">Contact Us</a>
                      </li>
                      <li>
                        <a href="#">Plan &amp; Pricing</a>
                      </li>
                      <li>
                        <a href="#">Blog</a>
                      </li>
                    </ul>
                  </div>
                  <!-- end /.footer-menu -->
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- end /.col-lg-3 -->

              <div class="col-md-3 col-sm-4">
                <div class="footer-widget">
                  <div class="footer-menu no-padding">
                    <h4 class="footer-widget-title">Layanan Informasi</h4>
                    <ul>
                      <li>
                        <a href="#">Support Forum</a>
                      </li>
                      <li>
                        <a href="#">Terms &amp; Conditions</a>
                      </li>
                      <li>
                        <a href="#">Support Policy</a>
                      </li>
                      <li>
                        <a href="#">Refund Policy</a>
                      </li>
                      <li>
                        <a href="#">FAQs</a>
                      </li>
                      <li>
                        <a href="#">Buyers Faq</a>
                      </li>
                      <li>
                        <a href="#">Sellers Faq</a>
                      </li>
                    </ul>
                  </div>
                  <!-- end /.footer-menu -->
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- Ends: .col-lg-3 -->

            </div>
            <!-- end /.row -->
          </div>
          <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

        <div class="mini-footer">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="copyright-text">
                  <p>© PTNBH Universitas Tanjungpura

                  </p>
                </div>


              </div>
            </div>
          </div>
        </div>
      </footer>

    <!-- end footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="{{ asset('ptnbh/script/index.js') }}"></script>
</body>

</html>
