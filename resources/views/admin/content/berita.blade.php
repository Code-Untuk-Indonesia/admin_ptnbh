@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ $title }}</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="searchorders"
                                                class="form-control search-orders" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>

                                </div><!--//col-->
                                <div class="col-auto">

                                    <select class="form-select w-auto">
                                        <option selected value="option-1">All</option>
                                        <option value="option-2">This week</option>
                                        <option value="option-3">This month</option>
                                        <option value="option-4">Last 3 months</option>

                                    </select>
                                </div>
                                <div class="col-auto">
                                    <a class="btn app-btn-secondary" href="#">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg>
                                        Download CSV
                                    </a>
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->


                <a class="btn app-btn-secondary mb-2" href="{{ route('berita.create') }}">
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
                                    <table class="table app-table-hover mb-0 text-left" id="berita-list"
                                        style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="cell" style="text-align: center;">No</th>
                                                <th class="cell" style="text-align: center;">Gambar</th>
                                                <th class="cell" style="text-align: center;">Judul (ID)</th>
                                                <th class="cell" style="text-align: center;">Konten (ID)</th>
                                                <th class="cell" style="text-align: center;">Title (EN)</th>
                                                <th class="cell" style="text-align: center;">Content (EN)</th>
                                                <th class="cell" style="text-align: center;">Tanggal</th>
                                                <th class="cell" style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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

    <script>
        assetUrl = "{{ asset('images/berita') }}";
        $(document).ready(function() {
            var table = $('#berita-list').DataTable({
                processing: false,
                serverSide: true,
                searching: true,
                info: false,
                order: true,
                paging: false,
                ajax: "{{ route('berita.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return '<img src="' + assetUrl + '/' + data +
                                '" alt="Gambar Berita" style="max-width: 100px;">';
                        }
                    },
                    {
                        data: 'judul_id',
                        name: 'judul_id'
                    },
                    {
                        data: 'konten_id',
                        name: 'konten_id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return '<a href="detail-berita/' + full.id +
                                '/id" class="btn btn-info btn-sm showBerita">Show</a>';
                        }
                    },
                    {
                        data: 'judul_en',
                        name: 'judul_en'
                    },
                    {
                        data: 'konten_en',
                        name: 'konten_en',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return '<a href="detail-berita/' + full.id +
                                '/en" class="btn btn-info btn-sm showBerita">Show</a>';
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, full, meta) {
                            // Ubah format tanggal
                            var date = new Date(data);
                            var options = {
                                weekday: 'long',
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            };
                            return date.toLocaleDateString('id-ID', options);
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ]
            });

            $('body').on('click', '.deleteBerita', function() {
                var berita_id = $(this).data("id");
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data akan dihapus secara permanen",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('berita.index') }}" + '/' + berita_id,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                table.ajax.reload();
                            },
                            error: function(data) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi Kesalahan Saat Menghapus',
                                });
                            }
                        });
                    }
                });
            });

            $('body').on('click', '.editBerita', function() {
                var berita_id = $(this).data('id');
                window.location.href = 'berita/' + berita_id + '/edit';
            });

            var successMessage = "{{ session('success') }}";
            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                    showConfirmButton: false,
                    timer: 1000
                });
            }
        });
    </script>
@endsection