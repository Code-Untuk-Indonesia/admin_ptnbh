@extends('halaman-user.template.header-footer')

@section('content')
    <!-- hero -->
    <section class="hero-profile" style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }});">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                FAKULTAS </h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>
    </section>
    <!-- end hero -->

    <!-- fakultas -->
    <section class="fakultas">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Selamat Datang di Universitas Tanjungpura</h2>
                    <p class="lead">Inilah beberapa fakultas yang menjadi bagian integral dari Universitas Tanjungpura.
                        Setiap
                        fakultas memiliki peran penting dalam mencetak lulusan berkualitas yang siap bersaing di dunia
                        profesional.
                    </p>
                </div>
            </div>
            <!-- Fakultas 1 -->
            <div class="card mb-3" data-aos="fade-left" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 1"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Hukum</h5>
                            <p class="card-text">Pada tahun 2020, Fakultas Hukum ingin menjadi lembaga pusat studi hukum
                                di kalimantan barat, yang menghasilkan sumber
                                daya manusia yang lebih baik yang dapat bersaing di tingkat lokal, regional, nasional,
                                dan internasional. Melalui
                                pendidikan, penelitian, dan pengabdian kepada masyarakat direncanakan dan melanjutkan,
                                Fakultas Hukum terus menghasilkan
                                lulusan yang baik dengan kompetensi akademik yang tinggi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 2 -->
            <div class="card mb-3" data-aos="fade-right" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6 order-md-2">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 2"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Ekonomi dan Bisnis</h5>
                            <p class="card-text">Fakultas Ekonomi didirikan pada tahun 1959 dan juga merupakan fakultas
                                tertua di Universitas Tanjungpura. Sampai saat
                                ini, Fakultas Eonomi terus mengembangkan pendidikan, penelitian, dan pengabdian kepada
                                masyarakat di Kalimantan Barat
                                untuk menjadi Pusat Informasi Ekonomi di Kalimantan Barat dan juga menjadi lembaga yang
                                selalu menghasilkan lulusan yang
                                kompeten untuk kondisi ekonomi yang lebih baik di Indonesia.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 3 -->
            <div class="card mb-3" data-aos="fade-left" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 3"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Pertanian</h5>
                            <p class="card-text">Pada tahun 2020, Fakultas Pertanian ingin menjadi pusat teknologi
                                informasi dalam ilmu pertanian. Fakultas Pertanian
                                terus mengembangkan ilmu pertanian lingkungan dan lanjutan di daerah lokal atau nasional
                                serta berkontribusi aktif
                                kepada masyarakat denga terus melakukan inovasi dan implementasi dalam teknologi ilmu
                                pertanian dengan tujuan memajukan
                                bangsa.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 4 -->
            <div class="card mb-3" data-aos="fade-right" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6 order-md-2">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 2"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Teknik</h5>
                            <p class="card-text">Fakultas Teknik terus menghasilkan lulusan yang kompeten untuk
                                kebutuhan lokal dan regional. Fakultas Teknik mendidik
                                mahasiswa untuk memiliki keterampilan yang baik dalam bidangnya, menguasai teknologi,
                                dan mengkontribusikan kreativitas
                                mereka untuk kehidupan sosial guna kemjuan bangsa dan terus mengembangan penerapan
                                ternologi dalam pembangunan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 5 -->
            <div class="card mb-3" data-aos="fade-left" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 3"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas ISIP</h5>
                            <p class="card-text">Fakultas Ilmu Sosial dan Ilmu Politik mempersiapkan lulusan yang
                                kompeten untuk kebutuhan lokal dan nasional. Fakultas
                                Ilmu Sosial dan Ilmu Politik pada tahun 2020 ingin menjadi lembaga pusat Politik,
                                Sosial, dan Budaya di Kalimantan Barat
                                khususnya dan Indonesia secara umumnya dengan tujuan selalu mempertahan kan nilai2 luhur
                                serta aspek aspek sosial dalam
                                kehidupan berpolitik atau sebaliknya.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 6 -->
            <div class="card mb-3" data-aos="fade-right" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6 order-md-2">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 2"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas IKIP</h5>
                            <p class="card-text">Fakultas Pendidikan dan Pelatihan Guru sebagai lembaga pendidik
                                menghasilkan guru atau pendidik dengan melakukan
                                pendidikan dan penelitian teladan yang berimbang dengan efektif, restrukturisasi, dan
                                sistem deregulasi.Sebagai fakultas
                                dengan mahasiswa terbanyak di harapkan dapat meningkatkan taraf kepedulian terhapap
                                pendidikan masyarakat Kalimantan
                                Barat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 7 -->
            <div class="card mb-3" data-aos="fade-left" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 3"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Kehutanan</h5>
                            <p class="card-text">Pada tahun 2020, Fakultas Kehutanan ingin menjadi lembaga unggul di
                                penelitian dan pengembangan ilmu kehutanan yang
                                dapat digunakan untuk pertumbuhan dan kesejahteraan masyarakat. Fakultas Kehutanan juga
                                memproduksi sarjana profesional
                                yang kompeten untuk kebutuhan lokal, nasional, dan internasional.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 8 -->
            <div class="card mb-3" data-aos="fade-right" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6 order-md-2">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 2"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas MIPA</h5>
                            <p class="card-text">Sebuah lembaga ilmu pasti dan ekstensi yang menghasilkan lulusan dengan
                                karakter berkualitas yang mampu bersaing di
                                tingkat lokal, nasional, dan internasional. Kami mendidik, meneliti, dan mengembangkan
                                ilmu pasti dalam
                                lingkungan.Tujuan kami adalah terus berinovasi dan mengembangkan iptek guna kemajuan
                                riset dan teknologi di masyarakat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 9 -->
            <div class="card mb-3" data-aos="fade-left" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 3"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Kedokteran</h5>
                            <p class="card-text">Menghasilkan lulusan berkualitas tinggi yang kompetitif dan profesional
                                di regional, nasional, maupun internasional
                                untuk mewujudkan Kalimantan Barat yang lebih baik. Kami membimbing siswa untuk
                                mengembangkan potensi mereka dengan
                                memfasilitasi mereka dengan ilmu pengetahuan dasar dan menyelesaikan penerapan dalam
                                masalah kesehatan. Kami juga
                                mengembangkan pengetahuan profesional dan keterampilan untuk meningkatkan kinerja
                                lulusan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fakultas 10 -->
            <div class="card mb-3" data-aos="fade-right" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-6 order-md-2">
                        <img src="{{ asset('ptnbh/asset/gedung-rektorat.jpg') }}" class="card-img-top" alt="Fakultas 2"
                            style="max-width: 300px; height: auto;">
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="card-body">
                            <h5 class="card-title">Program Pasca Sarjana</h5>
                            <p class="card-text">Program Pasca Sarjana Universitas Tanjungpura menyediakan program studi
                                lanjut jenjang Magister (S2) pada bidang Ilmu
                                Lingkungan. Mohon doanya segera menyusul Magister Bioteknologi dan Perencanaan
                                Pembangunan dan Wilayah Perdesaan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end fakultas -->

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
