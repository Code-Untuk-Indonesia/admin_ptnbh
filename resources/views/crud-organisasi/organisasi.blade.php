@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell" >Judul Organisasi </th>
                                                <th class="cell" >Isi Organisasi </th>
                                                <th class="cell" >Judul Organisasi(Eng) </th>

                                                <th class="cell" >Isi Organisasi(Eng) </th>
                                                <th class="cell" >aksi</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @foreach ($data as $item) --}}
                                            <tr>
                                                <td class="cell">
                                                    {{ $data->organisasi_id }}
                                                </td>
                                                <td class="cell">

                                                    {!! str_replace('pola_pencarian', 'pengganti', $data->isi_organisasi_id) !!}
                                                </td>
                                                <td class="cell">
                                                    {{ $data->organisasi_en }}
                                                </td>
                                                <td class="cell">
                                                    {!! str_replace('pola_pencarian', 'pengganti', $data->isi_organisasi_en) !!}
                                                </td>

                                                <td class="cell">
                                                    <button class="btn-sm app-btn-secondary">
                                                        <a href="{{ route('organisasi.edit', $data->id) }}">Edit</a>

                                                    </button>
                                                </td>
                                            </tr>
                                            {{-- @endforeach --}}

                                        </tbody>
                                    </table>

                                </div><!--//table-responsive-->

                            </div><!--//app-card-body-->
                        </div><!--//app-card-->

                    </div><!--//tab-pane-->


                </div><!--//tab-content-->



            </div><!--//container-fluid-->
        </div><!--//app-content-->



    </div><!--//app-wrapper-->


@endsection
