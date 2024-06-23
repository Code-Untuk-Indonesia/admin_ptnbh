@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3  align-items-center justify-content-between">
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
                                <div class="p-3 text-center">
                                    <h4>Gambar</h4>
                                    <img src="{{ asset('images/berita/' . $berita->gambar) }}" alt="Gambar Berita" width="250">
                                </div>
                            @endif
                        </div>

                        <div class="row mb-2" style="border: 1px solid #ddd; padding: 10px;">
                            <h3 class="mt-3 mb-3 text-center px-3">
                                <img src="{{ asset('ptnbh/asset/Indonesia.png') }}" alt="Indonesia Flag"
                                    style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                Berita - Indonesia
                            </h3>
                            <div class="mb-3">
                                <label for="judul_id" class="form-label">Judul (ID)</label>
                                <input type="text" class="form-control" id="judul_id" name="judul_id" value="{{ isset($berita) ? $berita->judul_id : '' }}" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="konten_id" class="form-label">Konten (ID)</label>
                                <textarea id="summernote_id" name="konten_id">{{ isset($berita) ? $berita->konten_id : '' }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-2" style="border: 1px solid #ddd; padding: 10px;">
                            <h3 class="mt-3 mb-3 text-center px-3">
                                <img src="{{ asset('ptnbh/asset/Uk.png') }}" alt="English Flag"
                                    style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                News - English
                            </h3>
                            <div class="mb-3">
                                <label for="judul_en" class="form-label">Title (EN)</label>
                                <input type="text" class="form-control" id="judul_en" name="judul_en" value="{{ isset($berita) ? $berita->judul_en : '' }}" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="konten_en" class="form-label">Content (EN)</label>
                                <textarea id="summernote_en" name="konten_en">{{ isset($berita) ? $berita->konten_en : '' }}</textarea>
                            </div>
                        </div>


                        <input type="hidden" id="beritaId" name="id" value="{{ isset($berita) ? $berita->id : '' }}">

                        <button type="submit" class="btn app-btn-primary" id="saveBtn">
                            @if (isset($berita))
                                <i class="fas fa-edit"></i> Update Berita
                            @else
                                <i class="fas fa-plus"></i> Tambah Berita
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote_id, #summernote_en').summernote({
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
            title: 'Error!',
            text: '{{ $errors->first() }}',
            onClose: () => {
                location.reload();
            }
        });
    @endif
</script>
@endsection
