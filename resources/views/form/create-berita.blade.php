@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form" id="formBerita" name="formBerita" method="POST" enctype="multipart/form-data" action="{{ isset($berita) ? route('berita.update', $berita->id) : route('berita.store') }}">
                        @csrf
                        @if(isset($berita))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="upload-gambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="gambar-berita" name="gambar-berita">
                            @if(isset($berita->gambar))
                                <div>
                                    <img src="{{ asset('images/berita/' . $berita->gambar) }}" alt="Gambar Berita" width="150">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea id="summernote" name="konten">{{ $berita->konten ?? '' }}</textarea>
                        </div>

                        <input type="hidden" id="beritaId" name="id" value="{{ isset($berita) ? $berita->id : '' }}">

                        <button type="submit" class="btn app-btn-primary" id="saveBtn">{{ isset($berita) ? 'Update Berita' : 'Tambah Berita' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']],
            ]
        });
    });
    
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Gagal Menyimpan Pengumuman!!',
            text: '{{ $errors->first() }}',
            onClose: () => {
                location.reload();
            }
        });
    @endif
</script>
@endsection
