@extends('halaman-user.template.header-footer')

@section('content')
    <!-- Hero section -->
    <section class="hero-profile" style="background-image: url({{ asset('ptnbh/asset/rektorat.jpg') }});">
        <div class="row">
            <h1 class="profile-1" data-aos="fade-up" data-aos-duration="2500"><span style="color: #ffea00;">|</span>
                UNDUHAN</h1>
            <p class="profile-2" data-aos="fade-up" data-aos-duration="2500">Universitas Tanjungpura</p>
        </div>
    </section>
    <!-- End Hero section -->

    <!-- Unduhan section -->
    <section class="galery" data-aos="fade-up" data-aos-duration="3000">
        <h1 class="galery-1">Unduhan Terbaru</h1>
        <div class="row" id="unduhan-container">
            @foreach ($unduhan as $item)
                <div class="col-md-4 mb-4">
                    <div class="card card-unduhan">
                        <div class="card-body">
                            <div class="file-preview">
                                <i class="fas fa-file-pdf fa-5x"></i>
                            </div>
                            <h5 class="card-title">{{ $item->judul_id }}</h5>
                            <a href="{{ asset('/files/unduh/' . $item->file) }}" class="btn btn-primary">Unduh</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button id="load-more-unduhan" class="btn-news">
            <a class="a-btn-news">
                Unduhan Lainnya <span><img src="{{ asset('ptnbh/asset/arrow.svg') }}" alt=""></span>
            </a>
        </button>
    </section>
    <!-- End Unduhan section -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var skip = 3;
            var totalUnduhan = {{ $totalUnduhan }};

            $('#load-more-unduhan').click(function(e) {
                e.preventDefault();
                loadMoreUnduhan();
            });

            function loadMoreUnduhan() {
                $.ajax({
                    url: "{{ route('unduh.loadMoreUnduhan') }}",
                    method: "GET",
                    data: {
                        skip: skip
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            var html = '';
                            response.forEach(function(unduh) {
                                html += '<div class="col-md-4 mb-4">';
                                html += '    <div class="card card-unduhan">';
                                html += '        <div class="card-body">';
                                html += '            <div class="file-preview">';
                                html += '                <i class="fas fa-file-pdf fa-5x"></i>';
                                html += '            </div>';
                                html += '            <h5 class="card-title">' + unduh.judul_id +
                                    '</h5>';
                                html += '            <a href="/files/unduh/' + unduh.file +
                                    '" class="btn btn-primary">Unduh</a>';
                                html += '        </div>';
                                html += '    </div>';
                                html += '</div>';
                            });
                            $('#unduhan-container').append(html);
                            skip += 10;
                            if (skip >= totalUnduhan) {
                                $('#load-more-unduhan').hide();
                            }
                        } else {
                            $('#load-more-unduhan').hide();
                        }
                    }
                });
            }
        });
    </script>
@endsection
