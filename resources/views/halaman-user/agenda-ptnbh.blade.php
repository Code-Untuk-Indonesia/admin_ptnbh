@extends('halaman-user.template.header-footer')
@section('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))
@section('hero-title', app()->getLocale() == 'id' ? 'Agenda' : 'Agenda')
@section('content')

    <!-- agenda -->
    <div class="agenda-container">
        <h2>Agenda Terbaru</h2>

        @foreach ($agenda as $item)
            <div class="agenda-item">
                <div class="date">
                    <div class="day">24</div>
                    <div class="month">Mei</div>
                </div>
                <div class="details">
                    <h3>{{ $item->judul_id }}</h3>
                    <p>09 Jul 2024 — 11 Jul 2024</p>
                    <p>Universitas Tanjungpura, Pontianak, Indonesia</p>
                </div>
            </div>
        @endforeach
        <a href="#" class="more-agenda">LIHAT AGENDA LAINNYA</a>
    </div>


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
                                    '" class="btn btn-agenda">Selengkapnya</a>';
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
