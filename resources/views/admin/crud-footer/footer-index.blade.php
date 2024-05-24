@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <h1>Footer Links</h1>
                                <a href="{{ route('footers.create') }}" class="btn btn-primary">Add Footer Link</a>
                                <table class="table table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>URL</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($footers as $footer)
                                            <tr>
                                                <td>{{ $footer->id }}</td>
                                                <td>{{ $footer->title }}</td>
                                                <td>{{ $footer->url }}</td>
                                                <td>
                                                    <a href="{{ route('footers.edit', $footer->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('footers.destroy', $footer->id) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
