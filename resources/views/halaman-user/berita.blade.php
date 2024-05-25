@extends('halaman-user.template.header-footer')
@section('content')
    <!-- hero profile -->
    <section class="hero-profile"
        style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }}); background-position: 30% 70%;">
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
                <p class="date-news-last">
                    {{ \Carbon\Carbon::parse($berita1->created_at)->translatedFormat('l, j F Y H:i') }}</p>
                <h1 class="title-news-last">
                    {{ $berita1->judul_id }}
                </h1>
                <div class="content-news-last">
                    {!! str_replace('news', 'search', $berita1->konten_id) !!}
                </div>
                <button class="btn-last-news" style="width: 150px">
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
        <div class="row" style="width: 100%">
            <div class="col">
                <h1 class="berita-1">
                    Berita Terbaru
                </h1>
            </div>
            <div class="col" style="display: flex; justify-content: end; align-items: flex-end">
                <form action="{{ route('beritapage') }}" method="GET">
                    <div class="input-group mb-4 border rounded-pill p-1"
                        style="width: 300px; display: flex; justify-content: end">
                        <input type="search" name="search" placeholder="What're you searching for?"
                            aria-describedby="button-addon3" class="form-control bg-none border-0"
                            value="{{ request()->get('search') }}">
                        <div class="input-group-append border-0">
                            <button id="button-addon3" type="submit" class="btn btn-link text-warning">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>




        <div class="row mb-3" id="berita-container">
            @foreach ($berita as $item)
                <div class="col mb-3">
                    <div class="card card-news">
                        <img src="{{ asset('/images/berita/' . $item->gambar) }}" class="img-berita-home" alt="...">
                        <div class="card-body" style="padding: 0">
                            <p class="card-text date-news">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('H:i ') }}
                                <span style="margin-left: 5px; margin-right: 5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5"
                                        fill="none">
                                        <circle cx="2" cy="2.5" r="2" fill="#7a8a99" />
                                    </svg>
                                </span>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' l, j F Y ') }}
                            </p>
                            <h5 class="card-title title-news">{{ $item->judul_id }}</h5>
                            <a href="{{ route('berita.showfe', ['slug' => $item->slug]) }}" class="btn btn-warning">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($berita->hasMorePages())
            <button class="btn-news" id="load-more-news" data-page="2" data-search="{{ request()->get('search') }}">
                <a class="a-btn-news" href="javascript:void(0)">
                    Berita Lainnya <span><img src="{{ asset('ptnbh/asset/arrow.svg') }}" alt=""></span>
                </a>
            </button>
        @endif
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#load-more-news').on('click', function(e) {
                e.preventDefault();

                var button = $(this);
                var page = button.data('page');
                var search = button.data('search');
                var url = "{{ route('beritapage') }}";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        page: page,
                        search: search
                    },
                    beforeSend: function() {
                        button.text('Loading...');
                    },
                    success: function(data) {
                        $('#berita-container').append(data);

                        var nextPage = page + 1;
                        button.data('page', nextPage);

                        if (data.trim() == '') {
                            button.remove(); // remove button if no more data
                        } else {
                            button.text('Berita Lainnya');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#load-more-news').on('click', function(e) {
                e.preventDefault();

                var button = $(this);
                var page = button.data('page');
                var url = "{{ route('beritapage') }}";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        page: page
                    },
                    beforeSend: function() {
                        button.text('Loading...');
                    },
                    success: function(data) {
                        $('#berita-container').append(data);

                        var nextPage = page + 1;
                        button.data('page', nextPage);

                        if (data.trim() == '') {
                            button.remove(); // remove button if no more data
                        } else {
                            button.text('Berita Lainnya');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
