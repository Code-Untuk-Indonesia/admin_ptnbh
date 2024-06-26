@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1>Edit Organisasi</h1>
            <form action="{{ route('organisasi.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
            
                <div class="row">
                    <div class="col-12 mb-3">
                        <div style="border: 1px solid #ddd; padding: 10px;">
                            <h3 class="mt-3 mb-3 text-center px-3">
                                <img src="{{ asset('ptnbh/asset/Indonesia.png') }}" alt="Indonesia Flag"
                                    style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                Organisasi - Indonesia
                            </h3>
                            <div class="form-group">
                                <label for="organisasi_id">Judul Organisasi (ID)</label>
                                <input type="text" name="organisasi_id" class="form-control" value="{{ old('organisasi_id', $data->organisasi_id) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="isi_organisasi_id">Isi Organisasi (ID)</label>
                                <textarea name="isi_organisasi_id" id="summernote" class="form-control" required>{{ old('isi_organisasi_id', $data->isi_organisasi_id) }}</textarea>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-12 mb-3">
                        <div style="border: 1px solid #ddd; padding: 10px;">
                            <h3 class="mt-3 mb-3 text-center px-3">
                                <img src="{{ asset('ptnbh/asset/Uk.png') }}" alt="English Flag"
                                    style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                Organization - English
                            </h3>
                            <div class="form-group">
                                <label for="organisasi_en">Judul Organisasi (EN)</label>
                                <input type="text" name="organisasi_en" class="form-control" value="{{ old('organisasi_en', $data->organisasi_en) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="isi_organisasi_en">Isi Organisasi (EN)</label>
                                <textarea name="isi_organisasi_en" id="summernote2" class="form-control" required>{{ old('isi_organisasi_en', $data->isi_organisasi_en) }}</textarea>
                            </div>
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
