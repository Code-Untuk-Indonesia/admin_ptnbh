@extends('halaman-user.template.header-footer')
@section('content')
    <!-- hero profile -->
    <section class="hero-profile" style="background-image: url({{asset('ptnbh/asset/rektorat.jpg')}}); background-position: 30% 70%;">
        <div class="row">
            <h1 class="profile-1"><span style="color: #ffea00;">|</span> Berita </h1>
            <p class="profile-2">Universitas Tanjungpura</p>
        </div>
        </div>

    </section>
    <!-- end -->
    <!-- news -->
    <!-- news  -->
    <section class="news">
        <h1 class="news-1" data-aos="fade-up" data-aos-duration="2000">
            Berita Terbaru
        </h1>

        <div class="row">
            <div class="col">
                <img class="img-news-last" src="{{asset('ptnbh/asset/rektorat-untan-scaled-2048x1152.jpg')}}" alt="">
            </div>
            <div class="col" style="width: 100%; height: 100%;">
                <p class="date-news-last">07 Mei 2024 </p>
                <h1 class="title-news-last">
                    UNTAN Mewisuda 2.096 Wisudawan: Membangun Kualifikasi dan Soft Skills untuk Masa Depan Kalimantan
                    Barat
                </h1>
                <p class="content-news-last">
                    Universitas Tanjungpura (UNTAN) mewisuda 2.096 wisudawan pada tanggal 24-25 April 2024. Ini adalah
                    sebuah pencapaian yang membanggakan bagi UNTAN dan juga untuk masyarakat secara keseluruhan.
                    Keberadaan para wisudawan ini tidak hanya menambah jumlah sumber daya manusia (SDM), tetapi juga
                    membawa beragam kualifikasi dan jenjang pendidikan tinggi yang sangat diperlukan untuk memenuhi
                    kebutuhan zaman.
                </p>
                <button class="btn-last-news">
                    <a href="" style="text-decoration: none; color: #ffea00;">
                        Selengkapnya..
                    </a>
                </button>
            </div>
        </div>

    </section>
    <section style="padding: 0 100px;">
        <hr style="width: 100%; height: 2px; background-color: #7a8a99; border: none;">

    </section>

    <!-- news  -->

    <section class="news-all">

    </section>
    <!-- end news -->

@endsection
