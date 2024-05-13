@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Tambah Berita</h1>
                    </div>

                </div><!--//row-->




            </div><!--//container-fluid-->
        </div><!--//app-content-->

        <div class="container">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">

                    <div class="app-card-body">
                        <form class="settings-form" id="formBerita" name="formBerita">

                            <div class="mb-3">
                                <label for="upload-gambar" class="form-label">Upload Gambar<span class="ms-2"
                                        data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                        data-bs-placement="top"
                                        data-bs-content="Ini adalah contoh popover Bootstrap. Anda dapat menggunakan popover untuk memberikan informasi tambahan."><svg
                                            width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                            <circle cx="8" cy="4.5" r="1" />
                                        </svg></span></label>
                                <input type="file" class="form-control" id="gambar-berita" name="gambar-berita">
                            </div>

                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Judul<span class="ms-2"
                                        data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                        data-bs-placement="top"
                                        data-bs-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg
                                            width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                            <circle cx="8" cy="4.5" r="1" />
                                        </svg></span></label>
                                <input type="text" class="form-control" id="judul" value="Judul Berita"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="setting-input-3" class="form-label">Konten</label>
                                <textarea id="summernote"></textarea>
                            </div>
                            <button type="submit" class="btn app-btn-primary" id="saveBtn">Buat Berita</button>
                        </form>
                    </div><!--//app-card-body-->

                </div><!--//app-card-->
            </div>

        </div>



    </div><!--//app-wrapper-->

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
    </script>
    @include('form.js.create-berita-js')
@endsection
