@extends('halaman-user.template.header-footer')
@section('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))
@section('hero-title', app()->getLocale() == 'id' ? 'Kontak' : 'Contact')

@section('content')
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
            /* align-items: center; */
            justify-content: center;
        }
    </style>

    <!-- kontak  -->
    <section class="kontak">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-duration="1500">
                    <h2>{{ app()->getLocale() == 'id' ? 'Hubungi Kami' : 'Contact Us' }}</h2>
                    <p>{{ app()->getLocale() == 'id' ? 'Untuk informasi lebih lanjut, jangan ragu untuk menghubungi kami melalui kontak berikut:' : 'For more information, please feel free to contact us through the following contacts:' }}
                    </p>
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
                    <h2>{{ app()->getLocale() == 'id' ? 'Lokasi Kami' : 'Our Location' }}</h2>
                    <div id="leaflet-map" style="height: 400px;"></div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                    <h2>
                        {{ app()->getLocale() == 'id' ? 'Formulir Kontak' : 'Form Contact' }}
                    </h2>
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                {{ app()->getLocale() == 'id' ? 'Nama' : 'Name' }}</label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">
                                {{ app()->getLocale() == 'id' ? 'Pesan' : 'Message' }}</label>
                            <textarea class="form-control" id="pesan" rows="5" required></textarea>
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ app()->getLocale() == 'id' ? 'Kirim Pesan' : 'Send Message' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end kontak -->

    <script>
        // leaflet
        var map = L.map('leaflet-map').setView([-0.060646, 109.3423133], 15)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map)

        var marker = L.marker([-0.060646, 109.3423133]).addTo(map)
        marker.bindPopup('<b>Universitas Tanjungpura</b>').openPopup()
    </script>
@endsection
