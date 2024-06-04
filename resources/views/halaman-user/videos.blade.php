@extends('halaman-user.template.header-footer')
@section('hero-bg', asset('ptnbh3/asset/rektorat.jpg'))
@section('hero-title', app()->getLocale() == 'id' ? 'Dokumentasi Video' : 'Video Gallery')

@section('content')


    <section class="video-gallery">
        <h1 class="video-gallery-title" data-aos="fade-up" data-aos-duration="2000">
            Dokumentasi Video
        </h1>
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($videos as $video)
                <div class="col-md-4 col-sm-6 col-12 mb-4">
                    <div class="card card-video img-hover-zoom">
                        <iframe src="https://www.youtube.com/embed/{{ $video->link }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <span class="video-title">
                            {{ app()->getLocale() == 'id' ? $video->judul_id : $video->judul_en }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="btn-news" id="load-more-videos">
            <a class="a-btn-news" href="/videos">
                Dokumentasi Lainnya <span><img src="{{ asset('ptnbh3/asset/arrow.svg') }}" alt=""></span>
            </a>
        </button>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var skip = 3;
            var totalVideos = {{ $totalVideos }};

            $('#load-more-videos').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('videos.loadMoreVideos') }}",
                    method: "GET",
                    data: {
                        skip: skip
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            var html = '';
                            response.forEach(function(video) {
                                html += '<div class="col-md-4 col-sm-6 col-12 mb-4">';
                                html +=
                                    '    <div class="card card-video img-hover-zoom">';
                                html +=
                                    '        <iframe src="https://www.youtube.com/embed/' +
                                    video.link +
                                    '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                                html += '        <span class="video-title">' + (video
                                        .judul_id ? video.judul_id : video.judul_en) +
                                    '</span>';
                                html += '    </div>';
                                html += '</div>';
                            });
                            $('#video-container').append(html);
                            skip += 3;
                            if (skip >= totalVideos) {
                                $('#load-more-videos').hide();
                            }
                        } else {
                            $('#load-more-videos').hide();
                        }
                    }
                });
            });
        });
    </script>
@endsection
