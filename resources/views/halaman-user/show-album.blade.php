@extends('halaman-user.template.header-footer')

@section('content')
<style>
        .card-galery {
    min-width: 200px;
    border: none;
}
</style>
    <!-- hero profile -->
    <section class="hero-profile"
        style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }}); background-position: 30% 70%;">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                GALERI </h1>

            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>

    </section>
    <!-- end -->

    <section class="galery" data-aos="fade-up" data-aos-duration="2000">
        <h1 class="galery-1" data-aos="fade-up" data-aos-duration="2000">
            {{ app()->getLocale() == 'id' ? $album->judul_id : $album->judul_en }}
        </h1>
        <div class="row mb-3" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($album->photos as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card-galery">

                        <div class="img-hover-zoom">
                            <img class="img-news" src="{{ asset('/images/galeri/' . $item->gambar) }}" alt="img-news">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn-news">
            <a class="a-btn-news" href="{{ route('galeri.index') }}">
                Galeri Lainnya <span><img src="{{ asset('ptnbh/asset/arrow.svg') }}" alt=""></span>
            </a>
        </button>
    </section>
@endsection
