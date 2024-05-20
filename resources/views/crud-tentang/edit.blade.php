@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1>Edit Tentang</h1>
            <form action="{{ route('tentang.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul_sejarah">Judul Sejarah</label>
                    <input type="text" name="judul_sejarah" class="form-control" value="{{ old('judul_sejarah', $data->judul_sejarah) }}" required>
                </div>

                <div class="form-group">
                    <label for="title_history">Judul Sejarah (Eng)</label>
                    <input type="text" name="title_history" class="form-control" value="{{ old('title_history', $data->title_history) }}" required>
                </div>

                <div class="form-group">
                    <label for="isi_sejarah">Isi Sejarah</label>
                    <textarea name="isi_sejarah" id="summernote" class="form-control" required>{{ old('isi_sejarah', $data->isi_sejarah) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content_history">Isi Sejarah (Eng)</label>
                    <textarea name="content_history" id="summernote2"  class="form-control" required>{{ old('content_history', $data->content_history) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="visi">Visi</label>
                    <textarea name="visi" class="form-control"  id="summernote3"  required>{{ old('visi', $data->visi) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="visi_eng">Visi (Eng)</label>
                    <textarea name="visi_eng" class="form-control"  id="summernote4"  required>{{ old('visi_eng', $data->visi_eng) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="misi">Misi</label>
                    <textarea name="misi" class="form-control" id="summernote5" required>{{ old('misi', $data->misi) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="misi_eng">Misi (Eng)</label>
                    <textarea name="misi_eng" class="form-control" id="summernote6" required>{{ old('misi_eng', $data->misi_eng) }}</textarea>
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
    $(document).ready(function() {
        $('#summernote3').summernote({
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
        $('#summernote4').summernote({
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
        $('#summernote5').summernote({
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
        $('#summernote6').summernote({
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
