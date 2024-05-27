@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

                    <!-- Table for Bahasa Indonesia -->
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <h3>Home - Indonesia</h3>
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Judul PTNBH</th>
                                            <th class="cell">Content PTNBH</th>
                                            <th class="cell">Judul Rektor</th>
                                            <th class="cell">Sambutan Rektor</th>
                                            <th class="cell">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($data as $item) --}}
                                        <tr>
                                            <td class="cell">{{ $data->judul_ptnbh_id }}</td>
                                            <td class="cell">{{ $data->tentang_ptnbh_id }}</td>
                                            <td class="cell">{{ $data->judul_rektor_id }}</td>
                                            <td class="cell">{{ $data->sambutan_rektor_id }}</td>
                                            <td class="cell">
                                                <a class="btn btn-sm app-btn-secondary" href="{{ route('home.edit', $data->id) }}">Edit</a>
                                            </td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->

                    <!-- Table for English -->
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <h3>Home - Inggris</h3>
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Judul PTNBH</th>
                                            <th class="cell">Content PTNBH</th>
                                            <th class="cell">Judul Rektor</th>
                                            <th class="cell">Sambutan Rektor</th>
                                            <th class="cell">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($data as $item) --}}
                                        <tr>
                                            <td class="cell">{{ $data->judul_ptnbh_en }}</td>
                                            <td class="cell">{{ $data->tentang_ptnbh_en }}</td>
                                            <td class="cell">{{ $data->judul_rektor_en }}</td>
                                            <td class="cell">{{ $data->sambutan_rektor_en }}</td>
                                            <td class="cell">
                                                <a class="btn btn-sm app-btn-secondary" href="{{ route('home.edit', $data->id) }}">Edit</a>
                                            </td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->

                    <!-- Rektor Image Section -->
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body text-center">
                            <h3>Gambar Rektor</h3>
                            <div class="rektor-image mb-4">
                                <img src="{{ asset('/images/berita/' . $data->gambar_rektor) }}" class="img-fluid" style="width: 150px" alt="Rektor">
                            </div>
                            <h5>{{ $data->nama_rektor }}</h5>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->

                </div><!--//tab-pane-->
            </div><!--//tab-content-->

        </div><!--//container-fluid-->
    </div><!--//app-content-->

</div><!--//app-wrapper-->
@endsection
