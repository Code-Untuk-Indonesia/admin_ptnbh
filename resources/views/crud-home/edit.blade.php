@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1>Edit Home</h1>

                <form action="{{ route('home.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="judul_ptnbh_id">Judul PTNBH</label>
                                <input type="text" name="judul_ptnbh_id" class="form-control"
                                    value="{{ old('judul_ptnbh_id', $data->judul_ptnbh_id) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tentang_ptnbh_id">Tentang PTNBH</label>
                                <textarea name="tentang_ptnbh_id" id="summernote" class="form-control" required>{{ old('tentang_ptnbh_id', $data->tentang_ptnbh_id) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="judul_rektor_id">Judul Rektor</label>
                                <input type="text" name="judul_rektor_id" class="form-control"
                                    value="{{ old('judul_rektor_id', $data->judul_rektor_id) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="sambutan_rektor_id">Sambutan Rektor</label>
                                <textarea name="sambutan_rektor_id" id="summernote2" class="form-control" required>{{ old('sambutan_rektor_id', $data->sambutan_rektor_id) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="gambar_rektor">Gambar Rektor</label>
                                <input type="file" name="gambar_rektor" id="gambar_rektor" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="judul_ptnbh_en">Judul PTNBH (En)</label>
                                <input type="text" name="judul_ptnbh_en" class="form-control"
                                    value="{{ old('judul_ptnbh_en', $data->judul_ptnbh_en) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tentang_ptnbh_en">Tentang PTNBH (En)</label>
                                <textarea name="tentang_ptnbh_en" id="summernote13" class="form-control" required>{{ old('tentang_ptnbh_en', $data->tentang_ptnbh_en) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="judul_rektor_en">Judul Rektor (En)</label>
                                <textarea name="judul_rektor_en" class="form-control" required>{{ old('judul_rektor_en', $data->judul_rektor_en) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="sambutan_rektor_en">Sambutan Rektor (En)</label>
                                <textarea name="sambutan_rektor_en" id="summernote12" class="form-control" required>{{ old('sambutan_rektor_en', $data->sambutan_rektor_en) }}</textarea>
                            </div>


                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote13', ).summernote({
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
            $('#summernote12', ).summernote({
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
            $('#summernote', ).summernote({
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
