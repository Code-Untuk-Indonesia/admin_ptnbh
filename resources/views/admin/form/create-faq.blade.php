@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ isset($faq) ? 'Edit Faq' : 'Tambah Faq' }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" id="formFaq" name="formFaq" method="POST"
                            enctype="multipart/form-data"
                            action="{{ isset($faq) ? route('faq.update', $faq->id) : route('faq.store') }}">
                            @csrf
                            @if (isset($faq))
                                @method('PUT')
                            @endif

                            <div class="row mb-3">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="judul_id" class="form-label">Judul (ID)</label>
                                        <input type="text" class="form-control" id="judul_id" name="judul_id"
                                            value="{{ $faq->judul_id ?? '' }}" required>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="deskripsi_id" class="form-label">Deskripsi (ID)</label>
                                        <textarea class="form-control styled-textarea" id="deskripsi_id" name="deskripsi_id" rows="5">{{ $faq->deskripsi_id ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="judul_en" class="form-label">Title (EN)</label>
                                        <input type="text" class="form-control" id="judul_en" name="judul_en"
                                            value="{{ $faq->judul_en ?? '' }}" required>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="deskripsi_en" class="form-label">Description (EN)</label>
                                        <textarea class="form-control styled-textarea" id="deskripsi_en" name="deskripsi_en" rows="5">{{ $faq->deskripsi_en ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="faqId" name="id"
                                value="{{ isset($faq) ? $faq->id : '' }}">

                            <button type="submit" class="btn app-btn-primary"
                                id="saveBtn">{{ isset($faq) ? 'Update Faq' : 'Tambah Faq' }}</button>
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
                title: 'Gagal Menyimpan Faq!!',
                text: '{{ $errors->first() }}',
                onClose: () => {
                    location.reload();
                }
            });
        @endif
    </script>
@endsection
