@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ isset($video) ? 'Edit Album' : 'Tambah Album' }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" id="formVideo" name="formVideo" method="POST"
                            enctype="multipart/form-data"
                            action="{{ isset($video) ? route('video.update', $video->id) : route('video.store') }}">
                            @csrf
                            @if (isset($video))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="judul_id" class="form-label">Judul (ID)</label>
                                <input type="text" class="form-control" id="judul_id" name="judul_id"
                                    value="{{ old('judul_id', $video->judul_id ?? '') }}" required>
                                @error('judul_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="judul_en" class="form-label">Judul (EN)</label>
                                <input type="text" class="form-control" id="judul_en" name="judul_en"
                                    value="{{ old('judul_en', $video->judul_en ?? '') }}" required>
                                @error('judul_en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="link" class="form-label">Link Video</label>
                                <input type="text" class="form-control" id="link" name="link"
                                    value="{{ old('link', $video->link ?? '') }}" required>
                                @error('link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" id="videoId" name="id"
                                value="{{ isset($video) ? $video->id : '' }}">

                            <button type="submit" class="btn app-btn-primary"
                                id="saveBtn">{{ isset($video) ? 'Update Album' : 'Tambah Album' }}</button>
                        </form>

                        <div class="mt-4">
                            <h5>Preview Video</h5>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="videoPreview" class="embed-responsive-item" src=""
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan Video!!',
                text: '{{ $errors->first() }}',
            }).then(() => {
                location.reload();
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const linkInput = document.getElementById('link');
            const videoPreview = document.getElementById('videoPreview');

            function updateVideoPreview() {
                const linkValue = linkInput.value;
                const youtubeEmbedUrl = getYoutubeEmbedUrl(linkValue);
                videoPreview.src = youtubeEmbedUrl;
            }

            function getYoutubeEmbedUrl(url) {
                const urlPattern =
                    /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
                const match = url.match(urlPattern);
                if (match && match[1]) {
                    return `https://www.youtube.com/embed/${match[1]}`;
                }
                return '';
            }

            linkInput.addEventListener('input', updateVideoPreview);

            // Initial call to update the preview if the link is pre-filled
            updateVideoPreview();
        });
    </script>
@endsection
