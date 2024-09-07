@extends('halaman-user.template.header-footer')
@section('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))
@section('hero-title', app()->getLocale() == 'id' ? 'Pengumuman' : 'Announcements')

@section('content')


    <!-- pengumuman -->
    <section class="berita">
        <div class="container" data-aos="fade-up" data-aos-duration="3000">
            <h1 class="berita-1">Pengumuman Terbaru</h1>
            <div class="row" id="pengumuman-container">
                @foreach ($pengumuman as $item)
                    <div class="col-md-4">
                        <div class="card card-news">
                            <img src="{{ asset('images/pengumuman/' . $item->gambar) }}" class="card-img-top"
                                alt="{{ $item->judul_id }}">
                            <div class="card-body">
                                <p class="card-text date-news">
                                    {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                <h5 class="card-title title-news">
                                    {{ app()->getLocale() == 'id' ? $item->judul_id : $item->judul_en }}</h5>
                                <p class="card-text">
                                    {{ app()->getLocale() == 'id' ? \Illuminate\Support\Str::limit($item->konten_id, 100) : \Illuminate\Support\Str::limit($item->konten_en, 100) }}
                                </p>
                                <a href="{{ route('pengumuman.showpengumuman.id', ['slug' => $item->slug]) }}"
                                    class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button id="load-more-btn" class="btn-read">
                <a class="a-btn-news">Pengumuman Lainnya <span><img src="{{ asset('ptnbh3/asset/arrow.svg') }}"
                            alt=""></span></a>
            </button>
        </div>
    </section>
    <!-- end pengumuman -->

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
            var skip = 3; // Already loaded 3 items
            var totalPengumuman = {{ $totalPengumuman }};

            $('#load-more-btn').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('pengumuman.loadMore') }}",
                    method: "GET",
                    data: {
                        skip: skip
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            var html = '';
                            response.forEach(function(item) {
                                html +=
                                    '<div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">';
                                html += '    <div class="card card-news">';
                                html +=
                                    '        <img src="{{ asset('images/pengumuman') }}/' +
                                    item.gambar + '" class="card-img-top" alt="' + item
                                    .judul_id + '">';
                                html += '        <div class="card-body">';
                                html += '            <p class="card-text date-news">' +
                                    new Date(item.created_at).toLocaleDateString(
                                        'id-ID', {
                                            weekday: 'long',
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric'
                                        }) + '</p>';
                                html +=
                                    '            <h5 class="card-title title-news">' +
                                    item.judul_id + '</h5>';
                                html += '            <p class="card-text">' + item
                                    .konten_id.substring(0, 100) + '...</p>';
                                html += '            <a href="/pengumuman/' + item
                                    .slug +
                                    '" class="btn btn-primary">Selengkapnya</a>';
                                html += '        </div>';
                                html += '    </div>';
                                html += '</div>';
                            });
                            $('#pengumuman-container').append(html);
                            skip += 3; // Increment skip by 3
                            if (skip >= totalPengumuman) {
                                $('#load-more-btn')
                                    .hide(); // Hide button if no more items to load
                            }
                        } else {
                            $('#load-more-btn').hide(); // Hide button if no more items to load
                        }
                    }
                });
            });
        });
    </script>
@endsection
