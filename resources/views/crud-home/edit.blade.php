@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1>Edit Home</h1>

                <form action="{{ route('home.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="judul_ptnbh">Judul PTNBH</label>
                        <input type="text" name="judul_ptnbh" class="form-control"
                            value="{{ old('judul_ptnbh', $data->judul_ptnbh) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tentang_ptnbh">Tentang PTNBH</label>
                        <textarea name="tentang_ptnbh" class="form-control" required>{{ old('tentang_ptnbh', $data->tentang_ptnbh) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="sambutan_rektor">Sambutan Rektor</label>
                        <textarea name="sambutan_rektor" class="form-control" required>{{ old('sambutan_rektor', $data->sambutan_rektor) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar_rektor">Gambar Rektor</label>
                        <input type="text" name="gambar_rektor" class="form-control"
                            value="{{ old('gambar_rektor', $data->gambar_rektor) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
