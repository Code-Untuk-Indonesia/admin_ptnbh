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
                <p class="date-news-last">{{ \Carbon\Carbon::parse($berita1->created_at)->translatedFormat('l, j F Y H:i') }}</p>
                <h1 class="title-news-last">
                    {{$berita1->judul_id}}
                </h1>
                <div class="content-news-last">
                    {!! str_replace('news', 'search', $berita1->konten_id) !!}
                </div>
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
