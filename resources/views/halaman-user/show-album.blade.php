@extends('halaman-user.template.header-footer')

@section('content')
    <section class="album">
        <h1>{{ app()->getLocale() == 'id' ? $album->judul_id : $album->judul_en }}</h1>
        <div class="row">
            @foreach ($galeris as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card-photo">
                        <img src="{{ asset('/images/album/' . $item->gambar) }}" class="img-photo" alt="photo">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
