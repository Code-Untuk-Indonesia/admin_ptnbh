@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ isset($unitbisnis) ? 'Edit Unit Bisnis' : 'Tambah Unit Bisnis' }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" id="formUnitbisnis" name="formUnitbisnis" method="POST"
                            enctype="multipart/form-data"
                            action="{{ isset($unitbisnis) ? route('unit-bisnis.update', $unitbisnis->id) : route('unit-bisnis.store') }}">
                            @csrf
                            @if (isset($unitbisnis))
                                @method('PUT')
                            @endif

                            <div class="row mb-3">
                                <div class="col-12 col-lg-6" style="border-right: 1px solid #ddd; padding-left: 15px;">
                                    <h3 class="mt-2 mb-3 text-center px-3">
                                        <img src="{{ asset('ptnbh/asset/Indonesia.png') }}" alt="Indonesia Flag"
                                            style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                        Unit Bisnis - Indonesia
                                    </h3>
                                    <div class="mb-3">
                                        <label for="nama_id" class="form-label">Nama Unit Bisnis (ID)</label>
                                        <input type="text" class="form-control" id="nama_id" name="nama_id"
                                            value="{{ $unitbisnis->nama_id ?? '' }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi_id" class="form-label">Deskripsi (ID)</label>
                                        <textarea class="form-control styled-textarea" id="deskripsi_id" name="deskripsi_id" rows="5">{{ $unitbisnis->deskripsi_id ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6" style="border-left: 1px solid #ddd; padding-left: 15px;">
                                    <h3 class="mt-2 mb-3 text-center px-3">
                                        <img src="{{ asset('ptnbh/asset/Uk.png') }}" alt="English Flag"
                                            style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                        Bussines Unit - English
                                    </h3>
                                    <div class="mb-3">
                                        <label for="nama_en" class="form-label">Business Unit Name (EN)</label>
                                        <input type="text" class="form-control" id="nama_en" name="nama_en"
                                            value="{{ $unitbisnis->nama_en ?? '' }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi_en" class="form-label">Description (EN)</label>
                                        <textarea class="form-control styled-textarea" id="deskripsi_en" name="deskripsi_en" rows="5">{{ $unitbisnis->deskripsi_en ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="unitbisnisId" name="id"
                                value="{{ isset($unitbisnis) ? $unitbisnis->id : '' }}">


                            <button type="submit" class="btn app-btn-primary" id="saveBtn">
                                @if (isset($unitbisnis))
                                    <i class="fas fa-edit"></i> Update Unit Bisnis
                                @else
                                    <i class="fas fa-plus"></i> Tambah Unit Bisnis
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
                title: 'Gagal Menyimpan Unitbisnis!!',
                text: '{{ $errors->first() }}',
                onClose: () => {
                    location.reload();
                }
            });
        @endif
    </script>
@endsection
