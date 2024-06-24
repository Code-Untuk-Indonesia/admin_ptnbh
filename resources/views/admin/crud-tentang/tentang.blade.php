@extends('admin-template.navbar-footer')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Halaman Tentang</h1> 
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

                    <div class="row g-4 mb-4">
                        <h3 class="mt-3 text-center px-3">
                            <img src="{{ asset('ptnbh/asset/Indonesia.png') }}" alt="Indonesia Flag"
                                style="width: 30px; margin-right: 10px; margin-top: 5px;">
                            Tentang - Indonesia
                        </h3>
                        <a class="btn btn-sm app-btn-secondary" href="{{ route('home.edit', $data->id) }}">Edit</a>
                        <div class="col-12 col-lg-12">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">{{ $data->judul_sejarah_id }}</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                <div class="app-card-body px-4 mb-4">
                                    {!! $data->isi_sejarah_id !!}
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div><!--//col-->
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">{{ $data->judul_visi_id }}</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                <div class="app-card-body px-4 mb-4">
                                    {!! $data->visi_id !!}
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div><!--//col-->
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">{{ $data->judul_misi_id }}</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                <div class="app-card-body px-4 mb-4">
                                    {!! $data->misi_id !!}
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div><!--//col-->
                        <div class="col-12 col-lg-12">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">{{ $data->judul_tujuan_id }}</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                <div class="app-card-body px-4 mb-4">
                                    {!! $data->tujuan_id !!}
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div><!--//col-->
                    </div><!--//row-->

                    <div class="row g-4 mb-4">
                        <h3 class="mt-3 text-center px-3">
                            <img src="{{ asset('ptnbh/asset/Uk.png') }}" alt="English Flag"
                                style="width: 30px; margin-right: 10px; margin-top: 5px;">
                            About - English
                        </h3>
                        <a class="btn btn-sm app-btn-secondary" href="{{ route('home.edit', $data->id) }}">Edit</a>
                        <div class="col-12 col-lg-12">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">{{ $data->judul_sejarah_en }}</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                <div class="app-card-body px-4 mb-4">
                                    {!! $data->isi_sejarah_en !!}
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div><!--//col-->
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">{{ $data->judul_visi_en }}</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                <div class="app-card-body px-4 mb-4">
                                    {!! $data->visi_en !!}
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div><!--//col-->
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">{{ $data->judul_misi_en }}</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                <div class="app-card-body px-4 mb-4">
                                    {!! $data->misi_en !!}
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div><!--//col-->
                        <div class="col-12 col-lg-12">
                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">{{ $data->judul_tujuan_en }}</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                <div class="app-card-body px-4 mb-4">
                                    {!! $data->tujuan_en !!}
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div><!--//col-->
                    </div><!--//row-->

                </div><!--//tab-pane-->
            </div><!--//tab-content-->

        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<!-- Modal Templates -->
@include('admin.crud-tentang.tentang-modals', ['data' => $data])
@endsection
