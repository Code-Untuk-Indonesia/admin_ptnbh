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
                <img class="img-news-last" src="{{ asset('/images/berita/' . $berita1->gambar) }}" alt="">
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
                    <a href="{{ route('berita.show.id', $berita1->slug) }}" style="text-decoration: none; color: #ffea00;">
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
        <h1 class="berita-1">
            Berita Terbaru
        </h1>

        <div class="row mb-3" >
            @foreach ($berita as $item)
                <div class="col mb-3">
                    <div class="card card-news">
                        <img src="{{ asset('/images/berita/' . $item->gambar) }}" class="img-berita-home" alt="...">
                        <div class="card-body" style="padding: 0">
                            <p class="card-text date-news">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('H:i ') }}
                          <span
                            style="margin-left: 5px; margin-right: 5px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5"
                                fill="none">
                                <circle cx="2" cy="2.5" r="2" fill="#7a8a99" />
                            </svg></span>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' l, j F Y ') }}</p>
                            <h5 class="card-title title-news">{{ $item->judul_id }}</h5>
                            <a href="{{ route('berita.show.id', ['slug' => $item->slug]) }}" class="btn btn-warning">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="btn-news">
            <a class="a-btn-news" href="">
                Berita Lainnya <span><img src="{{ asset('ptnbh/asset/arrow.svg') }}" alt=""></span>
            </a>
        </button>
    </section>
    <!-- end news -->

@endsection
