@extends('halaman-user.template.header-footer')
@section('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))
@section('hero-title', app()->getLocale() == 'id' ? 'Tentang' : 'About')
@section('content')


    <!-- history -->
    <section class="history" data-aos="fade-up" data-aos-duration="3000">
        <div class="card-pengantar">
            <h1 class="history-1">
                {{ app()->getLocale() == 'id' ? $data->judul_sejarah_id : $data->judul_sejarah_en }}

            </h1>
            <p class="history-2">
                {!! app()->getLocale() == 'id'
                    ? str_replace('isi', 'sejarah', $data->isi_sejarah_id)
                    : str_replace('historyc', 'content', $data->isi_sejarah_en) !!}
            </p>

        </div>

    </section>
    <!-- end history -->
    <!-- profil -->
    <section class="profile">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card custom-card">
                    <div class="card-body row">
                        <!-- Visi -->
                        <div class="col-md-6">
                            <h1 class="title-profile">
                                <span style="color: #ffea00;">|</span> {{ $data->judul_visi_id }}
                            </h1>
                            <p class="misi-profile">
                                {!! app()->getLocale() == 'id'
                                    ? str_replace('isi', 'sejarah', $data->visi_id)
                                    : str_replace('historyc', 'content', $data->visi_en) !!}
                            </p>
                        </div>
                        <!-- Misi -->
                        <div class="col-md-6">
                            <h1 class="title-profile">
                                <span style="color: #ffea00;">|</span> {{ $data->judul_misi_id }}
                            </h1>
                            <p class="misi-profile">
                                {!! app()->getLocale() == 'id'
                                    ? str_replace('isi', 'sejarah', $data->visi_id)
                                    : str_replace('historyc', 'content', $data->misi_en) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end profil -->
    <section class="history" data-aos="fade-up" data-aos-duration="3000">
        <div class="card-pengantar">
            <h1 class="history-1"><span style="color: #ffea00;">|</span>
                {{ app()->getLocale() == 'id' ? $data->judul_tujuan_id : $data->judul_tujuan_en }}

            </h1>
            <p class="history-3">
                {!! app()->getLocale() == 'id'
                    ? str_replace('isi', 'sejarah', $data->tujuan_id)
                    : str_replace('historyc', 'content', $data->tujuan_en) !!}
            </p>
        </div>

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
