@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1>Edit Tentang</h1>
                <form action="{{ route('tentang.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="judul_sejarah_id">Judul Sejarah (ID)</label>
                                <input type="text" name="judul_sejarah_id" class="form-control"
                                    value="{{ old('judul_sejarah_id', $data->judul_sejarah_id) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="isi_sejarah_id">Isi Sejarah (ID)</label>
                                <textarea name="isi_sejarah_id" id="summernote" class="form-control" required>{{ old('isi_sejarah_id', $data->isi_sejarah_id) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="judul_visi_id">Judul Visi (ID)</label>
                                <input type="text" name="judul_visi_id" class="form-control"
                                    value="{{ old('judul_visi_id', $data->judul_visi_id) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="visi_id">Visi (ID)</label>
                                <textarea name="visi_id" class="form-control" id="summernote3" required>{{ old('visi_id', $data->visi_id) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="judul_misi_id">Judul Misi (ID)</label>
                                <input type="text" name="judul_misi_id" class="form-control"
                                    value="{{ old('judul_misi_id', $data->judul_misi_id) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="misi_id">Misi (ID)</label>
                                <textarea name="misi_id" class="form-control" id="summernote5" required>{{ old('misi_id', $data->misi_id) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="judul_tujuan_id">Judul Tujuan (ID)</label>
                                <input type="text" name="judul_tujuan_id" class="form-control"
                                    value="{{ old('judul_tujuan_id', $data->judul_tujuan_id) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tujuan_id">Tujuan (ID)</label>
                                <textarea name="tujuan_id" class="form-control" id="summernote11" required>{{ old('tujuan_id', $data->tujuan_id) }}</textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="judul_sejarah_en">Judul Sejarah (EN)</label>
                                <input type="text" name="judul_sejarah_en" class="form-control"
                                    value="{{ old('judul_sejarah_en', $data->judul_sejarah_en) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="isi_sejarah_en">Isi Sejarah (EN)</label>
                                <textarea name="isi_sejarah_en" id="summernote2" class="form-control" required>{{ old('isi_sejarah_en', $data->isi_sejarah_en) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="judul_visi_en">Judul Visi (EN)</label>
                                <input type="text" name="judul_visi_en" class="form-control"
                                    value="{{ old('judul_visi_en', $data->judul_visi_en) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="visi_en">Visi (EN)</label>
                                <textarea name="visi_en" class="form-control" id="summernote4" required>{{ old('visi_en', $data->visi_en) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="judul_misi_en">Judul Misi (EN)</label>
                                <input type="text" name="judul_misi_en" class="form-control"
                                    value="{{ old('judul_misi_en', $data->judul_misi_en) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="misi_en">Misi (EN)</label>
                                <textarea name="misi_en" class="form-control" id="summernote6" required>{{ old('misi_en', $data->misi_en) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="judul_tujuan_en">Judul Tujuan (EN)</label>
                                <input type="text" name="judul_tujuan_en" class="form-control"
                                    value="{{ old('judul_tujuan_en', $data->judul_tujuan_en) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tujuan_en">Tujuan (EN)</label>
                                <textarea name="tujuan_en" class="form-control" id="summernote1" required>{{ old('tujuan_en', $data->tujuan_en) }}</textarea>
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
            const summernoteConfig = {
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
            };
    
            const summernoteIds = [
                '#summernote1',
                '#summernote11',
                '#summernote',
                '#summernote2',
                '#summernote3',
                '#summernote4',
                '#summernote5',
                '#summernote6'
            ];
    
            summernoteIds.forEach(function(id) {
                $(id).summernote(summernoteConfig);
            });
        });
    </script>
    
@endsection
