@extends('halaman-user.template.header-footer')

@section('content')
    <!-- hero -->
    <section class="hero-profile" style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }});">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                AGENDA </h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>
    </section>
    <!-- end hero -->

    <!-- agenda  -->
    <section class="berita" data-aos="fade-up" data-aos-duration="3000">
        <h1 class="berita-1">
            Agenda Terbaru
        </h1>
        <div class="row">
            <div class="col">
                <div class="card card-news">
                    <img src="{{ asset('ptnbh/asset/rektorat-untan-scaled-2048x1152.jpg') }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text date-news">Minggu, 5 Mei 2024</p>
                        <h5 class="card-title title-news">UNTAN Gelar Upacara Peringatan Hardiknas 2024 dan Dies Natalis
                            ke-65 UNTAN</h5>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-news">
                    <img src="{{ asset('ptnbh/asset/rektorat-untan-scaled-2048x1152.jpg') }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text date-news">Minggu, 5 Mei 2024</p>
                        <h5 class="card-title title-news">UNTAN Gelar Upacara Peringatan Hardiknas 2024 dan Dies Natalis
                            ke-65 UNTAN</h5>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-news">
                    <img src="{{ asset('ptnbh/asset/rektorat-untan-scaled-2048x1152.jpg') }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text date-news">Minggu, 5 Mei 2024</p>
                        <h5 class="card-title title-news">UNTAN Gelar Upacara Peringatan Hardiknas 2024 dan Dies Natalis
                            ke-65 UNTAN</h5>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn-news">
            <a class="a-btn-news">
                Agenda Lainnya <span><img src="asset/arrow.svg" alt=""></span>
            </a>
        </button>
    </section>
    <!-- end agenda -->

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
