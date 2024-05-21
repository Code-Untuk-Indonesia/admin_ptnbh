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
                    {!! str_replace('pola_pencarian', 'pengganti', $data->tentang_ptnbh_id) !!}

                </p>
            </div>
        </div>
    </section>

    <!--end pengantar  -->

    <!-- berita  -->
    <section class="berita" data-aos="fade-up" data-aos-duration="3000">
        <h1 class="berita-1">
            Berita Terbaru
        </h1>

            <div class="row">
                @foreach ($berita as $item)
                <div class="col">
                    <div class="card card-news">
                        <img src="{{ asset('/images/berita/' . $item->gambar) }}" class="img-berita-home"
                            alt="...">
                        <div class="card-body">
                            <p class="card-text date-news">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y H:i') }}</p>
                            <h5 class="card-title title-news">{{$item->judul_id}}</h5>
                            <a href="#" class="btn btn-primary">Berita Selengkapnya</a>
                        </div>
                    </div>
                </div>
        @endforeach
            </div>

        <button class="btn-news">
            <a class="a-btn-news" href="/berita-user">
                Berita Lainnya <span><img src="asset/arrow.svg" alt=""></span>
            </a>
        </button>
    </section>
    <!-- end berita -->

    <!-- galery  -->
    <section class="galery">
        <h1 class="galery-1" data-aos="fade-up" data-aos-duration="2000">
            Galeri
        </h1>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
            <div class="col">
                <div class="card card-galery img-hover-zoom" style="width: 18rem;">
                    <img src="{{ asset('ptnbh/asset/rektorat-untan-scaled-2048x1152.jpg') }}" class="card-img-top img-news"
                        alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card card-galery img-hover-zoom" style="width: 18rem;">
                    <img src="{{ asset('ptnbh/asset/rektorat-untan-scaled-2048x1152.jpg') }}" class="card-img-top img-news"
                        alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card card-galery img-hover-zoom" style="width: 18rem;">
                    <img src="{{ asset('ptnbh/asset/rektorat-untan-scaled-2048x1152.jpg') }}" class="card-img-top img-news"
                        alt="...">
                </div>
            </div>
        </div>

        <button class="btn-news">
            <a class="a-btn-news" href="/galery">
                Galeri Lainnya <span><img src="asset/arrow.svg" alt=""></span>
            </a>
        </button>


    </section>
    <!-- end galery -->
    <!-- rektor -->
    <section class="rektor" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h1 class="text-rektor display-4">
                        Sambutan Rektor Universitas Tanjungpura
                    </h1>
                    <p class="text-rektor2 lead">
                        Sekapur Sirih – Selamat datang di website resmi Universitas Tanjungpura Pontianak. Universitas
                        Tanjungpura Pontianak berdiri sejak 20 Mei 1959, dan banyak prestasi yang sudah ditorehkan
                        bidang
                        Tri Dharma Perguruan Tinggi, sehingga kini Universitas Tanjungpura Pontianak dikenal oleh
                        masyarakat
                        luas disamping sebagai universitas pertama di Kalimantan Barat, juga sebagai institusi
                        preservasi
                        ilmiah memiliki reputasi pendidikan berkualitas. Sebagai wujud kepedulian terhadap tujuan
                        pembangunan nasional terutama dalam mencerdaskan bangsa, Universitas Tanjungpura terus melakukan
                        pengembangan dan pembaruan untuk merespon kebutuhan stakeholders (mahasiswa, orangtua mahasiswa,
                        masyarakat profesi dan masyarakat pengguna lulusan). Langkah-langkah riil ini telah dilakukan
                        antara
                        lain penataan dan penerapan kurikulum berbasis kompetensi (KBK) pada semua program studi baik
                        pada
                        program sarjana, diploma, magister dan program doktor. Proses pendidikan di baku mutu melalui
                        kegiatan penjaminan mutu oleh Lembaga Pengembangan Pembelajaran dan Penjaminan Mutu (LP3M)
                        Universitas sebagai bentuk pertanggung-jawaban internal universitas dalam hal mutu lulusan
                        terhadap
                        stakeholders. Selain itu, penjaminan mutu eksternal juga dilakukan melalui Badan Akreditasi
                        Nasional
                        Perguruan Tinggi (BAN-PT) dan hasilnya hampir semua program studi memperoleh peringkat B, bahkan
                        beberapa program studi memperoleh peringkat Akreditasi A. Pada tahun 2019 Universitas
                        Tanjungpura
                        telah memperoleh peringkat Akreditasi Institusi A dari Badan Akreditasi Nasional Perguruan
                        Tinggi
                        (BAN-PT).
                    </p>
                    <blockquote class="blockquote text-center">
                        <p class="mb-0 text-rektor3 display-5 text-uppercase"
                            style=" font-family: 'Arial Black', sans-serif; letter-spacing: 2px;">
                            Prof. Dr. Garuda Wiko, S.H., M.Si
                        </p>
                    </blockquote>
                </div>
                <div class="col-md-5" style="text-align: center;">
                    <div class="card card-rektor" style="border: none;">
                        <img src="{{ asset('ptnbh/asset/Prof.-Garuda-Wiko.png') }}" alt="rektor"
                            class="img-fluid img-rektor rounded-circle shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->

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
