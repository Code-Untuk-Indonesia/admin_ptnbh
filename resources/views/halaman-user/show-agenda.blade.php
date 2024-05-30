@extends('halaman-user.template.header-footer')
@section('content')
    <!-- hero profile -->
    <section class="hero-profile"
        style="background-image: url({{ asset('ptnbh3/asset/rektorat.jpg') }}); background-position: 30% 70%;">
        <div class="row">
            <h1 class="profile-1"><span style="color: #ffea00;">|</span> Agenda </h1>
            <p class="profile-2">Universitas Tanjungpura</p>
        </div>
        </div>

    </section>
    <!-- end -->

    <!-- main -->
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{ asset('/images/agenda/' . $agenda->gambar) }}" alt="Gambar agenda">
                        </div>
                        <div class="article-title">
                            <!-- <h6><a href="#">Lifestyle</a></h6> -->
                            <h2>{{ strip_tags($agenda->judul_id) }}</h2>
                            <div class="media">
                                <div class="media-body">
                                    <span>{{ strip_tags($agenda->created_at) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            {!! str_replace('pola_pencarian', 'pengganti', $agenda->deskripsi_id) !!}
                        </div>
                    </article>
                    <div class="contact-form article-comment">
                        <h4>Leave a Reply</h4>
                        <form id="contact-form" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Name" id="name" placeholder="Name *" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Email" id="email" placeholder="Email *" class="form-control"
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send">
                                        <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">


                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                            @foreach ($moreagenda as $item)
                                <div class="latest-post-aside media">
                                    <div class="lpa-left media-body">
                                        <div class="lpa-title">
                                            <h5><a href="#">{{ $item->judul_id }}</a></h5>
                                        </div>
                                        <div class="lpa-meta">
                                            <a class="date" href="#">
                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM YYYY') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lpa-right">
                                        <a href="#">
                                            <img src="{{ asset('/images/agenda/' . $item->gambar) }}" title=""
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Latest Post -->
                </div>
            </div>
        </div>
    </div>
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
