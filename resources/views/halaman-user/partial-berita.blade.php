@foreach ($berita as $item)
    <div class="col mb-3">
        <div class="card card-news">
            <img src="{{ asset('/images/berita/' . $item->gambar) }}" class="img-berita-home" alt="...">
            <div class="card-body" style="padding: 0">
                <p class="date-news-last">
                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('H:i ') }}
                    <span style="margin-left: 5px; margin-right: 5px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5" fill="none">
                            <circle cx="2" cy="2.5" r="2" fill="#7a8a99" />
                        </svg>
                    </span>
                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' l, j F Y ') }}
                </p>
                <h5 class="card-title title-news"  style="text-align: start; padding: 0">   {{ app()->getLocale() == 'id' ? $item->judul_id : $item->judul_en }}</h5>
                <a href="{{ route('berita.show.id', ['slug' => $item->slug]) }}" class="btn btn-warning"> {{ app()->getLocale() == 'id' ? 'Baca Selengkapnya...' : 'Read More...' }}</a>
            </div>
        </div>
    </div>
@endforeach
