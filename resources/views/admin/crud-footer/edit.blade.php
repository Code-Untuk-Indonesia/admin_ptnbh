@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1>Edit Footer Link</h1>
                <form action="{{ route('footers.update', $footer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $footer->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="url" name="url" class="form-control" value="{{ $footer->url }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
