@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">{{ isset($album) ? 'Edit Album' : 'Tambah Album' }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form" id="formAlbum" name="formAlbum" method="POST" enctype="multipart/form-data" action="{{ isset($berita) ? route('berita.update', $berita->id) : route('berita.store') }}">
                        @csrf
                        @if(isset($album))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $album->judul ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="upload-gambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="gambar-album" name="gambar-album">
                            @if(isset($album->gambar))
                                <div>
                                    <img src="{{ asset('images/album/' . $album->gambar) }}" alt="Gambar Album" width="150">
                                </div>
                            @endif
                        </div>

                        <input type="hidden" id="albumId" name="id" value="{{ isset($album) ? $album->id : '' }}">

                        <button type="submit" class="btn app-btn-primary" id="saveBtn">{{ isset($album) ? 'Update Album' : 'Tambah Album' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script> 
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Gagal Menyimpan Album!!',
            text: '{{ $errors->first() }}',
            onClose: () => {
                location.reload();
            }
        });
    @endif
</script>
@endsection
