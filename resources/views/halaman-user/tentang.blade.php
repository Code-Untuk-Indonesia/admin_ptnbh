@extends('halaman-user.template.header-footer')
@section('content')
    <!-- hero profile -->
    <section class="hero-profile" style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }});">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                TENTANG </h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>
    </section>
    <!-- end -->

    <!-- history -->
    <section class="history" data-aos="fade-up" data-aos-duration="3000">
        <div class="card-pengantar">
            <h1 class="history-1">{{$data->judul_sejarah_id}}</h1>
            <p class="history-2">{!! str_replace('isi', 'sejarah', $data->isi_sejarah_id) !!}</p>

        </div>

    </section>
    <!-- end history -->
    <!-- profil -->
    <section class="profile">

        <div class="row">
            <div class="col">
                <h1 class="title-profile">
                    <span style="color: #ffea00;">|</span> Visi
                </h1>
                <p class="misi-profile">
                    {!! str_replace('isi', 'sejarah', $data->visi_id) !!}
                </p>
            </div>
            <div class="col">
                <h1 class="title-profile">
                    <span style="color: #ffea00;">|</span> Misi
                </h1>
                <p class="misi-profile">
                    {!! str_replace('isi', 'misi', $data->misi_id) !!}
                </p>

            </div>
        </div>
    </section>
    <!-- end profil -->
    <section class="history" data-aos="fade-up" data-aos-duration="3000">

        <h1 class="history-1"><span style="color: #ffea00;">|</span> Tujuan</h1>
        <p class="history-3">Pada Tonggak kedua: tahun 2020-2024 seluruh kegiatan UNTAN ditujukan untuk membangun UNTAN
            sebagai perguruan tinggi yang mampu menjadi Universitas Riset dan Pelayanan Bermutu Menuju Peningkatan Daya
            Saing Untan dalam rangka merealisasikan Perguruan Tinggi Negeri Berbadan Hukum (PTN-BH). Tujuan UNTAN
            sebagai berikut:
            <br>
            <br>1. Tujuan bidang pendidikan dan pengajaran, yaitu UNTAN sebagai pelaksana pendidikan tinggi bertujuan
            untuk
            memberikan pengetahuan yang bertaraf nasional dan internasional dengan tidak meninggalkan kearifan lokal
            daerah Kalimantan Barat, sehingga mampu:

            <br> a. membentuk insan akademis beriman dan bertakwa kepada Tuhan Yang Maha Esa, berakhlak mulia, dan
            berkepribadian luhur;
            <br> b. membentuk insan akademis yang kritis, inovatif, mandiri, percaya diri, dan berjiwa wirausaha;
            <br> c. membentuk insan akademis yang toleran, peka sosial dan lingkungan, demokratis, dan bertanggung
            jawab;
            <br> d. menjadi masyarakat akademis yang menjunjung tinggi budaya ilmiah dan tanggap terhadap perubahan yang
            terjadi tingkat lokal, regional, nasional maupun internasional;
            <br> e. menghasilkan lulusan yang menjunjung tinggi sikap dan nilai ilmiah, berprestasi, berdayaguna,
            beradaptasi dan bekerjasama sehingga dapat
            <br> f. berperan serta secara aktif dalam pembangunan bangsa; dan
            <br> g. menjadi institusi preservasi, baik dalam ilmu pengetahuan dan teknologi serta sosial budaya.
            <br>
            <br> 2. Tujuan bidang penelitian, yaitu UNTAN melaksanakan penelitian yang berskala daerah, nasional, dan
            internasional yang dapat menghasilkan luaran yang berkualitas, berupa:
            <br> a. produk ilmu pengetahuan, teknologi, seni, atau olah raga yang memberikan kemaslahatan bagi
            masyarakat, bangsa, negara, umat manusia, dan lingkungan;
            <br> b. kajian pembangunan;
            <br> c. model pembangunan yang dapat ditawarkan bagi program pembangunan yang berkelanjutan; dan
            <br> d. model dan hasil pengembangan ilmu pengetahuan dan teknologi serta sosial budaya.
            <br>
            <br> 3. Tujuan bidang pengabdian kepada masyarakat, yaitu UNTAN melaksanakan pengabdian/pelayanan pada
            masyarakat dalam bentuk:
            <br> a. menyediakan informasi ilmiah, bersifat lokal, nasional, regional, dan internasional;
            <br> b. memberikan inspirasi dan arah bagi pembangunan serta berperan dalam pembangunan daerah maupun
            nasional;
            <br> c. menjalin kerja sama dengan instansi pemerintah, swasta dan perguruan tinggi, baik di dalam maupun di
            luar negeri;
            <br> d. menjadi wahana bagi pembentukan kader pemimpin bangsa dan sumber daya manusia berkemampuan lanjut;
            dan
            <br> e. menjadi wahana pendidik dan mahasiswa untuk menerapkan ilmu pengetahuan dan teknologi di masyarakat.
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
