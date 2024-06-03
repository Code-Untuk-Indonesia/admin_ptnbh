@extends('halaman-user.template.header-footer')

@section('content')
    <!-- hero profile -->
    <section class="hero-profile"
        style="background-image: url({{ asset('ptnbh3/asset/rektorat.jpg') }}); background-position: 30% 70%;">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                GALERI </h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>

    </section>
    <!-- end -->

    <!-- galery  -->
    <section class="galery" data-aos="fade-up" data-aos-duration="2000">
        <h1 class="galery-1" data-aos="fade-up" data-aos-duration="2000">
            Galeri
        </h1>
        <div class="row mb-3" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($galeri as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card-galery">
                        <a href="{{ route('album.show', ['id' => $item->id]) }}" style="text-decoration: none">
                            <div class="img-hover-zoom">
                                <img class="img-news" src="{{ asset('/images/album/' . $item->gambar) }}" alt="img-news"
                                    style="border-radius: 18px;">
                            </div>
                            <h5 class="card-title title-news">
                                {{ app()->getLocale() == 'id' ? $item->judul_id : $item->judul_en }}
                            </h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn-news">
            <a class="a-btn-news" href="{{ route('galeri.index') }}">
                Galeri Lainnya <span><img src="{{ asset('ptnbh3/asset/arrow.svg') }}" alt=""></span>
            </a>
        </button>
    </section>
    <!-- end galery -->


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
