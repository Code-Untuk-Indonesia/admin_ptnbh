@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">{{ isset($unduh) ? 'Edit Album' : 'Tambah Album' }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form" id="formUnduh" name="formUnduh" method="POST" enctype="multipart/form-data" action="{{ isset($unduh) ? route('unduh.update', $unduh->id) : route('unduh.store') }}">
                        @csrf
                        @if(isset($unduh))
                        @method('PUT')
                        @endif
                        
                        <div class="mb-3">
                            <label for="judul_id" class="form-label">Judul (ID)</label>
                            <input type="text" class="form-control" id="judul_id" name="judul_id" value="{{ $unduh->judul_id ?? '' }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="judul_en" class="form-label">Judul (EN)</label>
                            <input type="text" class="form-control" id="judul_en" name="judul_en" value="{{ $unduh->judul_en ?? '' }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="upload-file" class="form-label">Upload File (PDF)</label>
                            <input type="file" class="form-control" id="file-unduh" name="file-unduh" accept="application/pdf" onchange="previewPDF(this)">
                            @if(isset($unduh->file))
                                <div>
                                    <a href="{{ asset('files/unduh/' . $unduh->file) }}" target="_blank">Lihat File PDF</a>
                                </div>
                            @endif
                        </div>
                        
                        <div class="mb-3" id="pdf-preview-container" style="display:none;">
                            <label for="pdf-preview" class="form-label">PDF Preview</label>
                            <iframe id="pdf-preview" width="100%" height="500px"></iframe>
                        </div>
                        
                        <input type="hidden" id="unduhId" name="id" value="{{ isset($unduh) ? $unduh->id : '' }}">

                        <button type="submit" class="btn app-btn-primary" id="saveBtn">{{ isset($unduh) ? 'Update File' : 'Tambah File' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewPDF(input) {
        const file = input.files[0];
        if (file && file.type === "application/pdf") {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewContainer = document.getElementById('pdf-preview-container');
                const preview = document.getElementById('pdf-preview');
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('pdf-preview-container').style.display = 'none';
        }
    }

    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Gagal Menyimpan File!!',
            text: '{{ $errors->first() }}',
            onClose: () => {
                location.reload();
            }
        });
    @endif
</script>
@endsection
