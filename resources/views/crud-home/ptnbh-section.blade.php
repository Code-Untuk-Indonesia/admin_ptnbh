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
                                                <th class="cell" >Judul </th>
                                                <th class="cell" >Content PTNBH</th>
                                                <th class="cell" >aksi</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @foreach ($data as $item) --}}
                                            <tr>
                                                <td class="cell">
                                                    {{ $data->judul_ptnbh }}
                                                </td>
                                                <td class="cell">
                                                    {{ $data->tentang_ptnbh }}
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
                        </div><!--//app-card-->
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell" >Foto Rektor </th>
                                        <th class="cell" >Sambutan Rektor</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td class="cell" >
                                           <img src="{{asset('template-admin/assets/images/profiles/profile-1.png')}}" alt="">
                                        </td>
                                        <td class="cell">
                                            {{$data->sambutan_rektor}}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div><!--//table-responsive-->
                        {{-- <nav class="app-pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav><!--//app-pagination--> --}}

                    </div><!--//tab-pane-->


                </div><!--//tab-content-->



            </div><!--//container-fluid-->
        </div><!--//app-content-->



    </div><!--//app-wrapper-->


@endsection
