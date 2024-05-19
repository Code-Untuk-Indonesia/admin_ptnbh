@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
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
                                    <div>
                                        <img src="{{ asset('images/agenda/' . $agenda->gambar) }}" alt="Gambar agenda"
                                            width="150">
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ $agenda->judul ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control styled-textarea" id="deskripsi" name="deskripsi" rows="5">{{ $agenda->deskripsi ?? '' }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $agenda->tanggal_agenda ?? '' }}" required>
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

                            <input type="hidden" id="agendaId" name="id"
                                value="{{ isset($agenda) ? $agenda->id : '' }}">

                            <button type="submit" class="btn app-btn-primary"
                                id="saveBtn">{{ isset($agenda) ? 'Update Agenda' : 'Tambah Agenda' }}</button>
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
