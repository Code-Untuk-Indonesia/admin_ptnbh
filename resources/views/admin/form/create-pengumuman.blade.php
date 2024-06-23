@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">{{ isset($pengumuman) ? 'Edit Pengumuman' : 'Tambah Pengumuman' }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form" id="formPengumuman" name="formPengumuman" method="POST" enctype="multipart/form-data" action="{{ isset($pengumuman) ? route('pengumuman.update', $pengumuman->id) : route('pengumuman.store') }}">
                        @csrf
                        @if(isset($pengumuman))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="upload-gambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="gambar-pengumuman" name="gambar-pengumuman">
                            @if(isset($pengumuman->gambar))
                                <div class="p-3 text-center">
                                    <h4>Gambar</h4>
                                    <img src="{{ asset('images/pengumuman/' . $pengumuman->gambar) }}" alt="Gambar pengumuman" width="250">
                                </div>
                            @endif
                        </div>

                        <div class="row mb-2" style="border: 1px solid #ddd; padding: 10px;">
                            <h3 class="mt-3 mb-3 text-center px-3">
                                <img src="{{ asset('ptnbh/asset/Indonesia.png') }}" alt="Indonesia Flag"
                                    style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                Pengumuman - Indonesia
                            </h3>

                            <div class="mb-3">
                                <label for="judul_id" class="form-label">Judul (ID)</label>
                                <input type="text" class="form-control" id="judul_id" name="judul_id" value="{{ $pengumuman->judul_id ?? '' }}" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="konten_id" class="form-label">Konten (ID)</label>
                                <textarea class="form-control styled-textarea" id="konten_id" name="konten_id" rows="5">{{ $pengumuman->konten_id ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-2" style="border: 1px solid #ddd; padding: 10px;">
                            <h3 class="mt-3 mb-3 text-center px-3">
                                <img src="{{ asset('ptnbh/asset/Uk.png') }}" alt="English Flag"
                                    style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                Announcement - English
                            </h3>
                            <div class="mb-3">
                                <label for="judul_en" class="form-label">Title (EN)</label>
                                <input type="text" class="form-control" id="judul_en" name="judul_en" value="{{ $pengumuman->judul_en ?? '' }}" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="konten_en" class="form-label">Content (EN)</label>
                                <textarea class="form-control styled-textarea" id="konten_en" name="konten_en" rows="5">{{ $pengumuman->konten_en ?? '' }}</textarea>
                            </div>
                        </div>


                        <input type="hidden" id="pengumumanId" name="id" value="{{ isset($pengumuman) ? $pengumuman->id : '' }}">

                        <button type="submit" class="btn app-btn-primary" id="saveBtn">
                            @if (isset($pengumuman))
                                <i class="fas fa-edit"></i> Update Pengumuman
                            @else
                                <i class="fas fa-plus"></i> Tambah Pengumuman
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
            title: 'Gagal Menyimpan Pengumuman!!',
            text: '{{ $errors->first() }}',
            onClose: () => {
                location.reload();
            }
        });
    @endif
</script>
@endsection
