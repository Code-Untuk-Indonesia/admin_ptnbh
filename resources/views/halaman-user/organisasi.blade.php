@extends('halaman-user.template.header-footer')
@section('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))
@section('hero-title', app()->getLocale() == 'id' ? 'Struktur Organisasi' : 'Organization Structure')

@section('content')



    <section class="history" data-aos="fade-up" data-aos-duration="3000">

        <h1 class="history-1"><span style="color: #ffea00;">|</span>
            {{ app()->getLocale() == 'id' ? $data->organisasi_id : $data->organisasi_en }}
        </h1>
        <p class="history-3">
            {!! app()->getLocale() == 'id'
                ? str_replace('isi', 'sejarah', $data->isi_organisasi_id)
                : str_replace('historyc', 'content', $data->isi_organisasi_en) !!}

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
