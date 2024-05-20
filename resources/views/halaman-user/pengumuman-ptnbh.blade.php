@extends('halaman-user.template.header-footer')

@section('content')
    <!-- hero -->
    <section class="hero-profile"
        style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }}); background-position: 30% 70%;">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                PENGUMUMAN </h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>

    </section>
    <!-- end hero -->

    <!-- pengumuman -->
    <section class="berita">
        <div class="container">
            <h1 class="berita-1">Pengumuman Terbaru</h1>
            <div class="row">
                <div class="col">
                    <div class="card card-news">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text date-news">Senin, 10 Mei 2024</p>
                            <h5 class="card-title title-news">Pengumuman Penting: Jadwal Ujian Semester Ganjil 2024</h5>
                            <p class="card-text">Berdasarkan keputusan Senat Universitas Tanjungpura, berikut adalah
                                jadwal ujian semester ganjil tahun akademik 2024/2025.</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-news">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text date-news">Rabu, 12 Mei 2024</p>
                            <h5 class="card-title title-news">Pengumuman Beasiswa Penuh untuk Mahasiswa Berprestasi</h5>
                            <p class="card-text">Universitas Tanjungpura memberikan kesempatan kepada mahasiswa
                                berprestasi
                                untuk mendapatkan beasiswa penuh. Silakan daftar segera!</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-news">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text date-news">Jumat, 15 Mei 2024</p>
                            <h5 class="card-title title-news">Pendaftaran Seminar Nasional Kesehatan Terbuka</h5>
                            <p class="card-text">Seminar Nasional Kesehatan akan diselenggarakan pada tanggal 20 Mei
                                2024. Daftar sekarang dan dapatkan ilmu yang bermanfaat!</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn-news">
                <a class="a-btn-news">Pengumuman Lainnya <span><img src="{{ asset('ptnbh/asset/arrow.svg') }}"
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
@endsection
