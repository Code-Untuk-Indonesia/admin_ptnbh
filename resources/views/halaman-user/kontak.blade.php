@extends('halaman-user.template.header-footer')

@section('content')
    <!-- hero -->
    <section class="hero-profile" style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }});">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                KONTAK </h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
        </div>
    </section>
    <!-- end hero -->

    <!-- kontak  -->
    <section class="kontak">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-duration="1500">
                    <h2>Kontak Kami</h2>
                    <p>Untuk informasi lebih lanjut, jangan ragu untuk menghubungi kami melalui kontak berikut:</p>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-map-marker"></i> Jl. Prof. Dr. H Jl. Profesor Dokter H. Hadari Nawawi,
                            Bansir Laut, Kec. Pontianak Tenggara, Kota Pontianak, Kalimantan
                            Barat 78124
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i> info@untan.ac.id
                        </li>
                        <li>
                            <i class="fa fa-phone"></i> 123-456-7890
                        </li>
                    </ul>
                    <h2>Lokasi Kami</h2>
                    <div id="leaflet-map" style="height: 400px;"></div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                    <h2>Formulir Kontak</h2>
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end kontak -->
@endsection
