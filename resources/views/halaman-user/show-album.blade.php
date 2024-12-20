@extends('halaman-user.template.header-footer')
@section('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))
@section('hero-title', app()->getLocale() == 'id' ? 'Galeri' : 'Gallery')
@section('content')

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
    </section>
@endsection
