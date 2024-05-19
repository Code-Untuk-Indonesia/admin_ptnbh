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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- aos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('ptnbh/style/style.css')}}">
    <link rel="stylesheet" href="{{asset('ptnbh/style/responsive.css')}}">
    <title>PTNBH Universitas Tanjungpura</title>
    <link rel="icon" href="{{asset('ptnbh/asset/Universitas_Tanjungpura_Pontianak.webp')}}" type="image/gif" sizes="16x16">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('ptnbh/asset/Universitas_Tanjungpura_Pontianak.webp')}}" alt="logo" width="30" height="30"
                    class="d-inline-block align-text-top me-2">Universitas Tanjungpura
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tentang
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="tentang.html">Profil</a></li>
                            <li><a class="dropdown-item" href="galery.html">Galeri</a></li>
                            <li><a class="dropdown-item" href="agenda.html">Agenda</a></li>
                            <li><a class="dropdown-item" href="pengumuman.html">Pengumuman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Lembaga
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li><a class="dropdown-item" href="unit.html">Unit Bisnis</a></li>
                            <li><a class="dropdown-item" href="fakultas.html">Fakultas</a></li>
                            <li><a class="dropdown-item" href="mahasiswa.html">Mahasiswa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="berita.html">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak.html">Kontak</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="asset/Indonesia.png" alt="" class="flag-img"> Indonesia
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="#"><img src="asset/Indonesia.png" alt=""
                                        class="flag-img">
                                    Indonesia</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><img src="asset/Uk.png" alt=""
                                        class="flag-img">English</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
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
    <!-- hero profile -->
    <section class="hero-profile" style="background-image: url({{asset('ptnbh/asset/rektorat.jpg')}}); background-position: 30% 70%;">
        <div class="row">
            <h1 class="profile-1"><span style="color: #ffea00;">|</span> Berita </h1>
            <p class="profile-2">Universitas Tanjungpura</p>
        </div>
        </div>

    </section>
    <!-- end -->

    <!-- main -->
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{ asset('/images/berita/' . $berita->gambar) }}" alt="Gambar Berita">
                        </div>
                        <div class="article-title">
                            <!-- <h6><a href="#">Lifestyle</a></h6> -->
                            <h2>T{{ strip_tags($berita->judul) }}</h2>
                            <div class="media">
                                <div class="media-body">
                                    <span>{{ strip_tags($berita->created_at) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            {!! str_replace('pola_pencarian', 'pengganti', $berita->konten) !!}
                        </div>
                    </article>
                    <div class="contact-form article-comment">
                        <h4>Leave a Reply</h4>
                        <form id="contact-form" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Name" id="name" placeholder="Name *" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Email" id="email" placeholder="Email *" class="form-control"
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" placeholder="Your message *" rows="4"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send">
                                        <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">


                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title="" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title="" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title="" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Post -->
                </div>
            </div>
        </div>
    </div>
    <!-- Section Dukung PTN BH -->
    <section class="dukung">
        <div class="container">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title">Dukung Transformasi Perguruan Tinggi Negeri Badan Hukum (PTN BH) Universitas
                        Tanjungpura!</h2>
                    <p class="card-text mt-4">Dukung evolusi Universitas Tanjungpura menuju Perguruan Tinggi Negeri
                        Badan
                        Hukum (PTN BH) untuk mewujudkan efisiensi,
                        peningkatan kualitas layanan, otonomi yang lebih besar, dan peningkatan kinerja.</p>
                    <a href="https://sinta.kemdikbud.go.id/ptnbhanalytics/v2/affiliations/detail/475"
                        class="btn btn-primary mt-4 mb-4">Lihat Progress Terkini Universitas Tanjungpura</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Dukung PTN BH -->

    <!-- footer -->
    <footer class="footer">
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
    </footer>



    <!-- end footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="script/index.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            const newsId = urlParams.get('id');

            if (newsId) {
                fetchNewsDetail(newsId);
            } else {
                console.error('ID berita tidak ditemukan.');
            }
        });

        async function fetchNewsDetail(newsId) {
            try {

                const response = await fetch('https://dev-admin-ptnbh.codeuntukindonesia.my.id/api-berita')
                const newsData = await response.json();
                if (newsData) {
                    displayNewsDetail(newsData);
                } else {
                    console.error('Data berita tidak ditemukan.');
                }
            } catch (error) {
                console.error('Error fetching news detail:', error);
            }
        }

        function displayNewsDetail(news) {
            const titleElement = document.querySelector('.news-title');
            const dateElement = document.querySelector('.news-date');
            const contentElement = document.querySelector('.news-content');

            titleElement.textContent = news.judul;
            dateElement.textContent = new Date(news.created_at).toLocaleString();
            contentElement.innerHTML = news.konten;
        }
    </script>
</body>

</html>


