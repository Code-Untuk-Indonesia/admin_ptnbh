@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1>Edit Home</h1>

                <form action="{{ route('home.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="judul_ptnbh">Judul PTNBH</label>
                        <input type="text" name="judul_ptnbh" class="form-control" value="{{ old('judul_ptnbh', $data->judul_ptnbh) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tentang_ptnbh">Tentang PTNBH</label>
                        <textarea name="tentang_ptnbh" id="summernote" class="form-control" required>{{ old('tentang_ptnbh', $data->tentang_ptnbh) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="sambutan_rektor">Sambutan Rektor</label>
                        <textarea name="sambutan_rektor" id="summernote2" class="form-control" required>{{ old('sambutan_rektor', $data->sambutan_rektor) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar_rektor">Gambar Rektor</label>
                        <input type="file" name="gambar_rektor" id="gambar_rektor" class="form-control">
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
