@foreach ($agenda as $item)
    <div class="col-md-4">
        <div class="card card-news">
            <img src="{{ asset('images/agenda') }}/{{ $agenda->gambar }}" class="card-img-top"
                alt="{{ $agenda->judul_id }}">
            <div class="card-body">
                <p class="card-text date-news">{{ $agenda->tanggal_agenda }}</p>
                <h5 class="card-title title-news">{{ $agenda->judul_id }}</h5>
                <p class="card-text">{{ substr($agenda->deskripsi_id, 0, 100) }}...</p>
                <a href="{{ route('agenda.show', ['id' => $item->id]) }}" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>
    </div>
@endforeach
