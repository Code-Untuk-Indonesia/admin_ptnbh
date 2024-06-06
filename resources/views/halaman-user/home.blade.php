@extends('halaman-user.template.header-footer')

@section('content')
    <!-- hero -->
    <section class="hero" style=" background-image: url({{ asset('ptnbh3/asset/rektorat-untan-scaled-2048x1152.jpg') }});">
        <h2 class="hero-1" data-aos="fade-up" data-aos-duration="2500">
            {{ app()->getLocale() == 'id' ? 'Universitas Tanjungpura  ' : ' Tanjungpura University ' }}</h2>
        <h1 class="hero-2" data-aos="fade-up" data-aos-duration="2500">Perguruan Tinggi Negeri
            Badan Hukum</h1>
    </section>
    <!-- end hero -->

    <!-- pengantar -->
    <section class="pengantar" data-aos="fade-up" data-aos-duration="3000">
        <div class="container">
            <div class="section-header">
                <h2> {{ app()->getLocale() == 'id' ? $data->judul_ptnbh_id : $data->judul_ptnbh_en }}</h2>
            </div>

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
    {{-- <section class="rektor" data-aos="fade-up" data-aos-duration="2000">
        <div class="text-section">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="image-section">
                        <img src="{{ asset('/images/berita/' . $data->gambar_rektor) }}" alt="rektor" class="img-rektor">
                        <h1 class="text-rektor3" style="text-align: center">{{ $data->nama_rektor }}</h1>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <h1 class="text-rektor">
                        {{ app()->getLocale() == 'id' ? $data->judul_rektor_id : $data->judul_rektor_en }}
                    </h1>
                    <div>
                        {!! app()->getLocale() == 'id'
                            ? str_replace(['<p '], [' <p class="text-rektor2" '], $data->sambutan_rektor_id)
                            : str_replace(['<p '], [' <p class="text-rektor2" '], $data->sambutan_rektor_en) !!}

                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!--  -->
    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">
        <div class="container" data-aos="zoom-out">

            <div class="row g-5">
                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center" style="flex-direction: column">
                    <div class="img">
                        <img src="{{ asset('/images/berita/' . $data->gambar_rektor) }}" alt="" class="img-fluid">

                    </div>
                    <h5 class="mt-4">{{ $data->nama_rektor }}</h5>
                </div>
                <div class="col-lg-8 col-md-6 content d-flex text-align-center flex-column justify-content-center order-last order-md-first">
                    <h3> {{ app()->getLocale() == 'id' ? $data->judul_rektor_id : $data->judul_rektor_en }}</h3>
                    <p class="text-align-center" style="text-align: center">  {!! app()->getLocale() == 'id'
                        ? str_replace('pola_pencarian', 'pengganti', $data->sambutan_rektor_id)
                        : str_replace('pola_pencarian', 'pengganti', $data->sambutan_rektor_en) !!}</p>

                </div>

            </div>

        </div>

    </section><!-- /Call To Action Section -->

    <!-- berita  -->
    {{-- <section class="berita" data-aos="fade-up" data-aos-duration="3000">
        <h1 class="berita-1">

            {{ app()->getLocale() == 'id' ? 'Berita Terbaru' : 'Latest News' }}
        </h1>

        <div class="row">
            @foreach ($berita as $item)
                <div class="col mb-3">
                    <div class="card card-news">
                        <img src="{{ asset('/images/berita/' . $item->gambar) }}" class="img-berita-home" alt="...">
                        <div class="card-body" style="padding: 0">
                            <p class="card-text date-news" style="padding-left: 5px;">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('H:i ') }}
                                <span style="margin-left: 5px; margin-right: 5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5"
                                        fill="none">
                                        <circle cx="2" cy="2.5" r="2" fill="#7a8a99" />
                                    </svg>
                                </span>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' l, j F Y ') }}
                            </p>
                            <h5 class="card-title title-news ">
                                {{ app()->getLocale() == 'id' ? $item->judul_id : $item->judul_en }}
                            </h5>
                            <a href="{{ route('berita.showfe', ['slug' => $item->slug]) }}"
                                class="btn btn-selengkapnya mb-3">
                                {{ app()->getLocale() == 'id' ? 'Baca Selengkapnya...' : 'Read More...' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn-news">
            <a class="a-btn-news" href="/berita-ptnbh">
                Berita Lainnya <span><img src="{{ asset('ptnbh3/asset/arrow.svg') }}" alt=""></span>
            </a>
        </button>
    </section> --}}
    <!-- end berita -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts sections-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2> {{ app()->getLocale() == 'id' ? 'Berita Terbaru' : 'Latest News' }}</h2>
            </div>

            <div class="row gy-4">
                @foreach ($berita as $item)
                    <div class="col-xl-4 col-md-6">
                        <article>

                            <div class="post-img">
                                <img src="{{ asset('/images/berita/' . $item->gambar) }}" alt="" class="img-fluid">
                            </div>

                            <p class="post-date">
                                <time datetime="2022-01-01">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('H:i ') }}
                                    <span style="margin-left: 5px; margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="4" height="5"
                                            viewBox="0 0 4 5" fill="none">
                                            <circle cx="2" cy="2.5" r="2" fill="#7a8a99" />
                                        </svg>
                                    </span>
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' l, j F Y ') }}</time>
                            </p>

                            <h2 class="title">
                                <a href="{{ route('berita.showfe', ['slug' => $item->slug]) }}">
                                    {{ app()->getLocale() == 'id' ? $item->judul_id : $item->judul_en }}</a>
                            </h2>


                        </article>
                    </div><!-- End post list item -->
                @endforeach
            </div><!-- End recent posts list -->
        </div>
        <button class="btn-read mt-4">
            <a class="a-btn-news" href="/berita-ptnbh">
                {{ app()->getLocale() == 'id' ? 'Berita Lainnya' : 'Other News' }}<span><img
                        src="{{ asset('ptnbh3/asset/arrow_forward_24dp_FILL0_wght400_GRAD0_opsz24.svg') }}"
                        alt=""></span>
            </a>
        </button>
    </section><!-- End Recent Blog Posts Section -->

    <!-- galery  -->
    {{-- <section class="galery">
        <h1 class="galery-1" data-aos="fade-up" data-aos-duration="2000">

            {{ app()->getLocale() == 'id' ? 'Galeri' : 'Gallery' }}
        </h1>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($galeri as $album)
                <div class="col">
                    <div class="card card-galery img-hover-zoom" style="width: 18rem;">
                        <img src="{{ asset('/images/album/' . $album->gambar) }}" class="card-img-top img-news"
                            alt="...">
                        <h5 class="card-title title-news">
                            {{ app()->getLocale() == 'id' ? $album->judul_id : $album->judul_en }}
                        </h5>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="btn-news">
            <a class="a-btn-news" href="/gallery">
                Galeri Lainnya <span><img src="{{ asset('ptnbh3/asset/arrow_forward_24dp_FILL0_wght400_GRAD0_opsz24.svg') }}" alt=""></span>
            </a>
        </button>
    </section> --}}
    <!-- end galery -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio ">
        <div class="" data-aos="fade-up">

            <div class="section-header">
                <h2> {{ app()->getLocale() == 'id' ? 'Galeri' : 'Gallery' }}</h2>
            </div>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 portfolio-container">
                    @foreach ($galeri as $album)
                        <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <a href="{{ route('album.show', ['id' => $album->id]) }}"
                                    data-gallery="portfolio-gallery-app" class="glightbox"><img
                                        src="{{ asset('/images/album/' . $album->gambar) }}" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="{{ route('album.show', ['id' => $album->id]) }}" title="More Details">
                                            {{ app()->getLocale() == 'id' ? $album->judul_id : $album->judul_en }}</a></h4>

                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->

            </div>

        </div>
        <button class="btn-news">
            <a class="a-btn-news" href="/gallery">
                {{ app()->getLocale() == 'id' ? 'Galery Lainnya' : 'Other Galery' }} <span><img
                        src="{{ asset('ptnbh3/asset/arrow_forward_24dp_FILL0_wght400_GRAD0_opsz24.svg') }}"
                        alt=""></span>
            </a>
        </button>
    </section><!-- End Portfolio Section -->

    <section class=" sections-bg">
        <div class="section-header">
            <h2> {{ app()->getLocale() == 'id' ? 'Dokumentasi Video' : 'Video Documentary' }}</h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($videos as $video)
                <div class="col-md-4 col-sm-6 col-12 mb-4">
                    <div class="card card-video img-hover-zoom">
                        <iframe src="https://www.youtube.com/embed/{{ $video->link }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <span class="video-title">
                            {{ app()->getLocale() == 'id' ? $video->judul_id : $video->judul_en }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="btn-news">
            <a class="a-btn-news" href="/videos">
                Dokumentasi Lainnya <span><img
                        src="{{ asset('ptnbh3/asset/arrow_forward_24dp_FILL0_wght400_GRAD0_opsz24.svg') }}"
                        alt=""></span>
            </a>
        </button>
    </section>


    <section class="galery">
        <div class="section-header">
            <h2> {{ app()->getLocale() == 'id' ? 'Unduhan' : 'Download' }}</h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($unduhan as $item)
                <div class="col-md-4 col-sm-6 col-12 mb-4">
                    <div class="card card-unduhan shadow-sm">
                        <div class="card-body text-center">
                            <div class="file-preview mb-3">
                                <i class="fas fa-file-pdf fa-5x"></i>
                            </div>
                            <h5 class="unduhan-title">
                                {{ app()->getLocale() == 'id' ? $item->judul_id : $item->judul_en }}
                            </h5>
                            <a href="{{ asset('/files/unduh/' . $item->file) }}" class="btn btn-primary"
                                style="background-color: #FFB606; color: #000;">
                                {{ app()->getLocale() == 'id' ? 'Unduh' : 'Download' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="btn-news">
            <a class="a-btn-news" href="/unduhan">
                {{ app()->getLocale() == 'id' ? 'Unduhan Lainnya' : 'Download more' }}<span><img
                        src="{{ asset('ptnbh3/asset/arrow_forward_24dp_FILL0_wght400_GRAD0_opsz24.svg') }}"
                        alt=""></span>
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
