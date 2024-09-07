@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Tambah Foto ke Album</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form" id="formGaleri" name="formGaleri" method="POST" enctype="multipart/form-data" action="{{ route('galeri.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="album">Pilih Album:</label>
                            <select name="id_album" class="form-control">
                                @foreach($albums as $album)
                                    <option value="{{ $album->id }}">{{ $album->judul_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="gambar-foto">Upload Gambar (Pilih beberapa gambar sekaligus):</label>
                            <input type="file" class="form-control" id="gambar-foto" name="gambar_foto[]" multiple>
                        </div>
                        
                        <div class="mb-3">
                            <label>Preview Gambar:</label>
                            <div id="image-preview" class="d-flex flex-wrap gap-3"></div>
                        </div>
                        
                        <button type="submit" class="btn app-btn-primary" id="saveBtn"><i class="fas fa-plus"></i>Tambah Foto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .image-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 250px;
        height: 250px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .image-card img {
        max-width: 230px;
        max-height: 230px;
    }
</style>

<script> 
    // Menampilkan preview gambar saat dipilih
    document.getElementById("gambar-foto").addEventListener("change", function(event) {
        let previewContainer = document.getElementById("image-preview");
        previewContainer.innerHTML = "";
        let files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            let reader = new FileReader();
            reader.onload = function() {
                let card = document.createElement('div');
                card.classList.add('image-card');
                
                let image = new Image();
                image.src = reader.result;

                card.appendChild(image);
                previewContainer.appendChild(card);
            }
            reader.readAsDataURL(file);
        }
    });
    
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Gagal Menyimpan Foto!!',
            text: '{{ $errors->first() }}',
            onClose: () => {
                location.reload();
            }
        });
    @endif
</script>
@endsection
