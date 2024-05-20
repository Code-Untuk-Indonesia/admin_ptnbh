@extends('halaman-user.template.header-footer')

@section('content')
    <!-- hero -->
    <section class="hero-profile" style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }});">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                UNIT BISNIS </h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>
    </section>
    <!-- end hero -->

    <!-- unit bisnis  -->
    <section class="unit-bisnis">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Unit Bisnis Universitas Tanjungpura</h2>
                    <p>Unit Bisnis Universitas Tanjungpura (UNTAN) merupakan bagian dari struktur organisasi yang
                        bertanggung jawab atas pengelolaan kegiatan bisnis yang terkait dengan operasional universitas.
                        Unit
                        bisnis ini mencakup berbagai aspek, termasuk layanan katering, penjualan produk-produk akademik,
                        pengelolaan aset universitas, dan sebagainya.</p>
                    <p>Berikut adalah beberapa unit bisnis yang umumnya ditemukan di UNTAN:</p>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Kantin dan Katering
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Unit ini bertanggung jawab atas penyediaan makanan dan
                                    minuman untuk mahasiswa, staf, dan pengunjung universitas. Mereka
                                    biasanya mengelola kantin di berbagai lokasi di kampus serta menyediakan layanan
                                    katering untuk acara-acara universitas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Pusat Penjualan Buku dan Perlengkapan Akademik
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Unit ini menyediakan tempat bagi mahasiswa dan staf untuk
                                    membeli buku teks, alat tulis, dan perlengkapan akademik
                                    lainnya. Mereka juga mungkin menjual merchandise universitas seperti kaos, topi, dan
                                    barang-barang lainnya.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Lembaga Penelitian dan Pengembangan
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Unit ini fokus pada penelitian dan pengembangan di berbagai
                                    bidang ilmu pengetahuan dan teknologi. Mereka dapat bekerja
                                    sama dengan industri dan lembaga lain untuk proyek-proyek riset yang relevan dan
                                    inovatif.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                                    aria-controls="flush-collapseFour">
                                    Unit Layanan Teknologi Informasi
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Unit ini menyediakan layanan teknologi informasi dan
                                    dukungan teknis bagi mahasiswa, staf, dan fakultas. Mereka
                                    bertanggung jawab atas pengelolaan infrastruktur TI universitas, pengembangan sistem
                                    informasi, dan pelatihan pengguna.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFive" aria-expanded="false"
                                    aria-controls="flush-collapseFive">
                                    Unit Pengembangan Karir
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Unit ini membantu mahasiswa dalam mempersiapkan diri untuk
                                    karir setelah lulus dengan menyediakan layanan konseling
                                    karir, pelatihan keterampilan, dan kesempatan magang.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseSix" aria-expanded="false"
                                    aria-controls="flush-collapseSix">
                                    Pusat Kewirausahaan Mahasiswa
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Unit ini mendukung mahasiswa dalam mengembangkan ide bisnis
                                    mereka sendiri dan memulai usaha kecil. Mereka menyediakan
                                    pelatihan, mentorship, dan sumber daya lainnya untuk membantu mahasiswa merintis
                                    bisnis mereka.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseSeven" aria-expanded="false"
                                    aria-controls="flush-collapseSeven">
                                    Unit Pemasaran dan Komunikasi
                                </button>
                            </h2>
                            <div id="flush-collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Unit ini bertanggung jawab atas pemasaran universitas,
                                    branding, dan komunikasi dengan berbagai pemangku kepentingan.
                                    Mereka mengelola situs web universitas, media sosial, dan kegiatan promosi lainnya.
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Setiap unit bisnis ini memiliki peran yang penting dalam mendukung misi dan visi Universitas
                        Tanjungpura serta memberikan nilai tambah bagi mahasiswa, staf, dan masyarakat umum. Dengan
                        berbagai
                        layanan yang ditawarkan, UNTAN dapat terus berkembang dan memberikan kontribusi positif bagi
                        kemajuan pendidikan dan pengembangan masyarakat.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end unit bisnis -->

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
