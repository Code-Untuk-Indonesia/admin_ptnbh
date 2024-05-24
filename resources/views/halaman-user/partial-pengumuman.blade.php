@foreach ($pengumuman as $item)
    <div class="col-md-4">
        <div class="card card-news">
            <img src="{{ asset('images/pengumuman/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul_id }}">
            <div class="card-body">
                <p class="card-text date-news">
                    {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                <h5 class="card-title title-news">{{ $item->judul_id }}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->konten_id, 100) }}</p>
                <a href="{{ route('pengumuman.showpengumuman.id', ['slug' => $item->slug]) }}"
                    class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>
    </div>
@endforeach
