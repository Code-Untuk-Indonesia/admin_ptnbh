
 @extends('halaman-user.template.header-footer')

 @section('content')
    <!-- hero profile -->
    <section class="hero-profile" style="background-image: url({{asset('ptnbh/asset/rektorat.jpg')}});">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
               STRUKTUR ORGANISASI </h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>
    </section>
    <!-- end -->


    <section class="history" data-aos="fade-up" data-aos-duration="3000">

        <h1 class="history-1"><span style="color: #ffea00;">|</span> {{ $data->organisasi }}</h1>
        <p class="history-3">
            {!! str_replace('pola_pencarian', 'pengganti', $data->isi_organisasi) !!}
        </p>

    </section>

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
