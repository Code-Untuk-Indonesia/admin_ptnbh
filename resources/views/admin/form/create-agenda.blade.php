@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ isset($agenda) ? 'Edit Agenda' : 'Tambah Agenda' }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" id="formAgenda" name="formAgenda" method="POST"
                            enctype="multipart/form-data"
                            action="{{ isset($agenda) ? route('agenda.update', $agenda->id) : route('agenda.store') }}">
                            @csrf
                            @if (isset($agenda))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="upload-gambar" class="form-label">Upload Gambar</label>
                                <input type="file" class="form-control" id="gambar-agenda" name="gambar-agenda">
                                @if (isset($agenda->gambar))
                                    <div class="p-3 text-center">
                                        <h4>Gambar</h4>
                                        <img src="{{ asset('images/agenda/' . $agenda->gambar) }}" alt="Gambar agenda"
                                            width="250">
                                    </div>
                                @endif
                            </div>

                            <div class="row mb-2" style="border: 1px solid #ddd; padding: 10px;">
                                <h3 class="mt-3 mb-3 text-center px-3">
                                    <img src="{{ asset('ptnbh/asset/Indonesia.png') }}" alt="Indonesia Flag"
                                        style="width: 30px; margin-right: 10px; margin-top: 5px;">
                                    Agenda - Indonesia
                                </h3>

                                <div class="mb-3">
                                    <label for="judul_id" class="form-label">Judul (ID)</label>
                                    <input type="text" class="form-control" id="judul_id" name="judul_id"
                                        value="{{ $agenda->judul_id ?? '' }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi_id" class="form-label">Deskripsi (ID)</label>
                                    <textarea class="form-control styled-textarea" id="deskripsi_id" name="deskripsi_id" rows="5">{{ $agenda->deskripsi_id ?? '' }}</textarea>
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
                                    <input type="text" class="form-control" id="judul_en" name="judul_en"
                                        value="{{ $agenda->judul_en ?? '' }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi_en" class="form-label">Description (EN)</label>
                                    <textarea class="form-control styled-textarea" id="deskripsi_en" name="deskripsi_en" rows="5">{{ $agenda->deskripsi_en ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6 mb-3">
                                    <label for="tanggal-mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal-mulai" name="tanggal-mulai"
                                        value="{{ $agenda->tanggal_mulai ?? '' }}" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="tanggal-akhir" class="form-label">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="tanggal-akhir" name="tanggal-akhir"
                                        value="{{ $agenda->tanggal_akhir ?? '' }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Waktu Pelaksanaan</label>
                                    <input type="time" class="form-control" id="waktu" name="waktu"
                                        value="{{ $agenda->waktu_agenda ?? '' }}" required>
                                </div>
    
                                <div class="mb-3">
                                    <label for="Lokasi" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                                        value="{{ $agenda->tempat_agenda ?? '' }}" required>
                                </div>
                            </div>


                            <input type="hidden" id="agendaId" name="id"
                                value="{{ isset($agenda) ? $agenda->id : '' }}">

                            <button type="submit" class="btn app-btn-primary" id="saveBtn">
                                @if (isset($agenda))
                                    <i class="fas fa-edit"></i> Update Agenda
                                @else
                                    <i class="fas fa-plus"></i> Tambah Agenda
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
                title: 'Gagal Menyimpan Agenda!!',
                text: '{{ $errors->first() }}',
                onClose: () => {
                    location.reload();
                }
            });
        @endif
    </script>
@endsection
