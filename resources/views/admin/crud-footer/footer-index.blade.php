@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <h1 class="app-page-title mb-4">Footer Links</h1>
                                <div class="mb-4">
                                    <a href="{{ route('footers.create') }}" class="btn btn-primary">Tambah Footer</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered mt-4">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Judul Footer</th>
                                                <th>Link URL</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($footers as $footer)
                                                <tr>
                                                    <td>{{ $footer->id }}</td>
                                                    <td>{{ $footer->title }}</td>
                                                    <td>{{ $footer->url }}</td>
                                                    <td>
                                                        <a href="{{ route('footers.edit', $footer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('footers.destroy', $footer->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div><!--//tab-pane-->
                </div><!--//tab-content-->
            </div><!--//container-xl-->
        </div><!--//app-content-->
    </div><!--//app-wrapper-->
@endsection
