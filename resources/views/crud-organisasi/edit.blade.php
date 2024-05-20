@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1>Edit Organisasi</h1>
            <form action="{{ route('organisasi.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="organisasi">Judul Organisasi</label>
                    <input type="text" name="organisasi" class="form-control" value="{{ old('organisasi', $data->organisasi) }}" required>
                </div>

                <div class="form-group">
                    <label for="organization">Judul Organisasi (Eng)</label>
                    <input type="text" name="organization" class="form-control" value="{{ old('organization', $data->organization) }}" required>
                </div>

                <div class="form-group">
                    <label for="isi_organisasi">Isi Organisasi</label>
                    <textarea name="isi_organisasi" id="summernote" class="form-control" required>{{ old('isi_organisasi', $data->isi_organisasi) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="organization_content">Isi Organisasi (Eng)</label>
                    <textarea name="organization_content" id="summernote2" class="form-control" required>{{ old('organization_content', $data->organization_content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
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
    $(document).ready(function() {
        $('#summernote2').summernote({
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
</script>
@endsection
