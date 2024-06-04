@extends('halaman-user.template.header-footer')
@section('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))
@section('hero-title', app()->getLocale() == 'id' ? 'Agenda' : 'Agenda')
@section('content')


    <!-- agenda  -->
    <section class="berita" data-aos="fade-up" data-aos-duration="3000">
        <h1 class="berita-1">
            Agenda Terbaru
        </h1>
        <div class="row" id="agenda-container">
            @foreach ($agenda as $item)
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card card-news">
                        <img src="{{ asset('images/agenda') }}/{{ $item->gambar }}" class="card-img-top"
                            alt="{{ $item->judul_id }}">
                        <div class="card-body">
                            <p class="card-text date-news">{{ $item->tanggal_agenda }}</p>
                            <h5 class="card-title title-news">
                                {{ app()->getLocale() == 'id' ? $item->judul_id : $item->judul_en }}
                            </h5>
                            <p class="card-text">
                                {{ app()->getLocale() == 'id' ? substr($item->deskripsi_id, 0, 100) : substr($item->deskripsi_en, 0, 100) }}...
                            </p>
                            <a href="{{ route('agenda.show', ['id' => $item->id]) }}"
                                class="btn btn-primary">Selengkapnya</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button id="load-more-agenda" class="btn-news">
            <a class="a-btn-news">
                Agenda Lainnya <span><img src="{{ asset('ptnbh3/asset/arrow.svg') }}" alt=""></span>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var skip = 3;
            var totalAgenda = {{ $totalAgenda }};

            $('#load-more-agenda').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('agenda.loadMoreAgenda') }}",
                    method: "GET",
                    data: {
                        skip: skip
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            var html = '';
                            response.forEach(function(agenda) {
                                html +=
                                    '<div class="col-md-4 mt-4" data-aos="fade-up" data-aos-duration="1500">';
                                html += '    <div class="card card-news">';
                                html +=
                                    '        <img src="{{ asset('images/agenda') }}/' +
                                    agenda.gambar + '" class="card-img-top" alt="' +
                                    agenda.judul_id + '">';
                                html += '        <div class="card-body">';
                                html += '            <p class="card-text date-news">' +
                                    agenda.tanggal_agenda + '</p>';
                                html +=
                                    '            <h5 class="card-title title-news">' +
                                    agenda.judul_id + '</h5>';
                                html += '            <p class="card-text">' + agenda
                                    .deskripsi_id.substring(0, 100) + '...</p>';
                                html +=
                                    '            <a href="/agenda-ptnbh/' + agenda.id +
                                    '" class="btn btn-primary">Selengkapnya</a>';
                                html += '        </div>';
                                html += '    </div>';
                                html += '</div>';
                            });
                            $('#agenda-container').append(html);
                            skip += 3;
                            if (skip >= totalAgenda) {
                                $('#load-more-agenda')
                                    .hide();
                            }
                        } else {
                            $('#load-more-agenda')
                                .hide();
                        }
                    }
                });
            });
        });
    </script>
@endsection
