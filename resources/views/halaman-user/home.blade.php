@extends('halaman-user.template.header-footer')

@section('content')
    <!-- hero -->
    <section class="hero" style=" background-image: url({{ asset('ptnbh/asset/rektorat-untan-scaled-2048x1152.jpg') }});">
        <h2 class="hero-1" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</h2>
        <h1 class="hero-2" data-aos="fade-up" data-aos-duration="2500">Perguruan Tinggi Negeri
            Badan Hukum</h1>
    </section>
    <!-- end hero -->

    <!-- pengantar -->
    <section class="pengantar" data-aos="fade-up" data-aos-duration="3000">
        <div class="container">
            <h1 class="pengantar-1">{{ $data->judul_ptnbh_id }}</h1>
            <div class="card-pengantar">
                <p class="pengantar-2">
                    {!! app()->getLocale() == 'id'
                        ? str_replace('pola_pencarian', 'pengganti', $data->tentang_ptnbh_id)
                        : str_replace('pola_pencarian', 'pengganti', $data->tentang_ptnbh_en) !!}
                </p>

            </div>
        </div>
    </section>

    <!--end pengantar  -->
    <!-- rektor -->
    <section class="rektor" data-aos="fade-up" data-aos-duration="2000" style="padding: 100px 120px">

        <div class="text-section">
            <div class="row">
                <div class="col-4" style="display: flex;align-items: center; padding: 20px">
                    <div class="image-section">
                        <img src="{{ asset('/images/berita/' . $data->gambar_rektor) }}" alt="rektor" class="img-rektor">
                        {{-- <h1 class="text-rektor3">Prof. Dr. Garuda Wiko, S.H., M.Si</h1> --}}
                    </div>
                </div>
                <div class="col">
                    <h1 class="text-rektor">{{ $data->judul_rektor_id }}</h1>
                    <div>
                        {!! str_replace(['<p '], [' <p class="text-rektor2" '], $data->sambutan_rektor_id) !!}
                    </div>



                </div>
            </div>


    </section>
    <!--  -->
    <!-- berita  -->
    <section class="berita" data-aos="fade-up" data-aos-duration="3000">
        <h1 class="berita-1">
            Berita Terbaru
        </h1>

        <div class="row">
            @foreach ($berita as $item)
                <div class="col mb-3">
                    <div class="card card-news">
                        <img src="{{ asset('/images/berita/' . $item->gambar) }}" class="img-berita-home" alt="...">
                        <div class="card-body" style="padding: 0">
                            <p class="card-text date-news" style="padding-left: 5px">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('H:i ') }}
                                <span style="margin-left: 5px; margin-right: 5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5"
                                        fill="none">
                                        <circle cx="2" cy="2.5" r="2" fill="#7a8a99" />
                                    </svg>
                                </span>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' l, j F Y ') }}
                            </p>
                            <h5 class="card-title title-news " style="padding-left: 5px">{{ $item->judul_id }}</h5>
                            <a href="{{ route('berita.showfe', ['slug' => $item->slug]) }}"
                                class="btn btn-news btn-warning mb-3">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="a-btn-news" href="/berita-ptnbh">
            <button class="btn-warning btn-news ">
                Berita Lainnya <span><img src="{{ asset('ptnbh/asset/arrow.svg') }}" alt=""></span>
            </button> </a>
    </section>
    <!-- end berita -->

    <!-- galery  -->
    <section class="galery">
        <h1 class="galery-1" data-aos="fade-up" data-aos-duration="2000">
            Galeri
        </h1>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($galeri as $album)
                <div class="col">
                    <div class="card card-galery img-hover-zoom" style="width: 18rem;">
                        <img src="{{ asset('/images/album/' . $album->gambar) }}" class="card-img-top img-news"
                            alt="...">
                        <h5 class="card-title title-news">{{ $album->judul_id }}</h5>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="btn-news">
            <a class="a-btn-news" href="">
                Galeri Lainnya <span><img src="asset/arrow.svg" alt=""></span>
            </a>
        </button>


    </section>
    <!-- end galery -->

    <!-- video  -->
    <section class="gallery">
        <h1 class="gallery-1" data-aos="fade-up" data-aos-duration="2000">
            Galeri
        </h1>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($videos as $video)
                <div class="col-md-4 mb-4">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->link }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            @endforeach
        </div>

        <button class="btn-news">
            <a class="a-btn-news" href="{{ route('video.index') }}">
                Lihat Semua Video <span><img src="{{ asset('asset/arrow.svg') }}" alt=""></span>
            </a>
        </button>
    </section>


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
@endsection
