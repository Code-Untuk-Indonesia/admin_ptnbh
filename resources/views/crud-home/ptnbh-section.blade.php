@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">



                <a class="btn app-btn-secondary mb-2" href="/create-berita">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" width="1.5em"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Tambah Berita
                </a>

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Judul PTNBH </th>
                                                <th class="cell">Content PTNBH</th>
                                                <th class="cell">Judul Rektor </th>
                                                <th class="cell">Sambutan Rektor</th>
                                                <th class="cell">aksi</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @foreach ($data as $item) --}}
                                            <tr>
                                                <td class="cell">
                                                    {{ $data->judul_ptnbh_id }}
                                                </td>
                                                <td class="cell">
                                                    {{ $data->tentang_ptnbh_id }}
                                                </td>
                                                <td class="cell">
                                                    {{ $data->judul_rektor_id }}
                                                </td>
                                                <td class="cell">
                                                    {{ $data->sambutan_rektor_id }}
                                                </td>
                                                <td class="cell">
                                                    <button class="btn-sm app-btn-secondary">
                                                        <a href="{{ route('home.edit', $data->id) }}">Edit</a>

                                                    </button>
                                                </td>
                                            </tr>
                                            {{-- @endforeach --}}

                                        </tbody>
                                    </table>

                                </div><!--//table-responsive-->


                            </div><!--//app-card-body-->
                            <div style="margin-bottom: 40px"></div>
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Judul PTNBH </th>
                                                <th class="cell">Content PTNBH</th>
                                                <th class="cell">Judul Rektor </th>
                                                <th class="cell">Sambutan Rektor</th>
                                                <th class="cell">aksi</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @foreach ($data as $item) --}}
                                            <tr>
                                                <td class="cell">
                                                    {{ $data->judul_ptnbh_en }}
                                                </td>
                                                <td class="cell">
                                                    {{ $data->tentang_ptnbh_en }}
                                                </td>
                                                <td class="cell">
                                                    {{ $data->judul_rektor_en }}
                                                </td>
                                                <td class="cell">
                                                    {{ $data->sambutan_rektor_en }}
                                                </td>
                                                <td class="cell">
                                                    <button class="btn-sm app-btn-secondary">
                                                        <a href="{{ route('home.edit', $data->id) }}">Edit</a>

                                                    </button>
                                                </td>
                                            </tr>
                                            {{-- @endforeach --}}

                                        </tbody>
                                    </table>

                                </div><!--//table-responsive-->
                            </div>
                        </div><!--//app-card-->


                    </div><!--//tab-pane-->


                </div><!--//tab-content-->



            </div><!--//container-fluid-->
        </div><!--//app-content-->



    </div><!--//app-wrapper-->
@endsection
