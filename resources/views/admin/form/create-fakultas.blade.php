@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ isset($fakultas) ? 'Edit Fakultas' : 'Tambah Fakultas' }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" id="formFakultas" name="formFakultas" method="POST"
                            enctype="multipart/form-data"
                            action="{{ isset($fakultas) ? route('fakultas.update', $fakultas->id) : route('fakultas.store') }}">
                            @csrf
                            @if (isset($fakultas))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="upload-gambar" class="form-label">Upload Gambar</label>
                                <input type="file" class="form-control" id="gambar-fakultas" name="gambar-fakultas">
                                @if (isset($fakultas->gambar))
                                    <div>
                                        <img src="{{ asset('images/fakultas/' . $fakultas->gambar) }}" alt="Gambar Fakultas"
                                            width="150">
                                    </div>
                                @endif
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="fakultas_id" class="form-label">Fakultas (ID)</label>
                                        <input type="text" class="form-control" id="fakultas_id" name="fakultas_id"
                                            value="{{ $fakultas->fakultas_id ?? '' }}" required>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="deskripsi_id" class="form-label">Deskripsi (ID)</label>
                                        <textarea class="form-control styled-textarea" id="deskripsi_id" name="deskripsi_id" rows="5">{{ $fakultas->deskripsi_id ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="fakultas_en" class="form-label">Faculty (EN)</label>
                                        <input type="text" class="form-control" id="fakultas_en" name="fakultas_en"
                                            value="{{ $fakultas->fakultas_en ?? '' }}" required>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="deskripsi_en" class="form-label">Description (EN)</label>
                                        <textarea class="form-control styled-textarea" id="deskripsi_en" name="deskripsi_en" rows="5">{{ $fakultas->deskripsi_en ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="fakultasId" name="id"
                                value="{{ isset($fakultas) ? $fakultas->id : '' }}">

                            <button type="submit" class="btn app-btn-primary"
                                id="saveBtn">{{ isset($fakultas) ? 'Update Fakultas' : 'Tambah Fakultas' }}</button>
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
                title: 'Gagal Menyimpan Fakultas!!',
                text: '{{ $errors->first() }}',
                onClose: () => {
                    location.reload();
                }
            });
        @endif
    </script>
@endsection
