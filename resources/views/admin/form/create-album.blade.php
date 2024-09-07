@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 align-items-center justify-content-between">
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
                    <form class="settings-form" id="formAlbum" name="formAlbum" method="POST" enctype="multipart/form-data" action="{{ isset($album) ? route('album.update', $album->id) : route('album.store') }}">
                        @csrf
                        @if(isset($album))
                        @method('PUT')
                        @endif
                        
                        <div class="mb-3">
                            <label for="upload-gambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="gambar-album" name="gambar-album">
                            @if(isset($album->gambar))
                                <div class="p-3 text-center">
                                    <h4>Gambar</h4>
                                    <img src="{{ asset('images/album/' . $album->gambar) }}" alt="Gambar Album" width="250">
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="judul_id" class="form-label">Judul (ID)</label>
                                <input type="text" class="form-control" id="judul_id" name="judul_id" value="{{ $album->judul_id ?? '' }}" required>
                            </div>
    
                            <div class="col-6 mb-3">
                                <label for="judul_en" class="form-label">Judul (EN)</label>
                                <input type="text" class="form-control" id="judul_en" name="judul_en" value="{{ $album->judul_en ?? '' }}" required>
                            </div>
                        </div>
                        

                        <input type="hidden" id="albumId" name="id" value="{{ isset($album) ? $album->id : '' }}">

                        <button type="submit" class="btn app-btn-primary" id="saveBtn">
                            @if (isset($album))
                                <i class="fas fa-edit"></i> Update Album
                            @else
                                <i class="fas fa-plus"></i> Tambah Album
                            @endif
                        </button>
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
