@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ $title }}</h1>
                    </div>
                </div><!--//row-->


                <a class="btn app-btn-secondary mb-2" href="{{ route('faq.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" width="1.5em"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Tambah Faq
                </a>

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="faq-list" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="cell" style="text-align: center;">No</th>
                                                <th class="cell" style="text-align: center;">Judul (ID)</th>
                                                <th class="cell" style="text-align: center;">Deskripsi (ID)</th>
                                                <th class="cell" style="text-align: center;">Title (EN)</th>
                                                <th class="cell" style="text-align: center;">Description (EN)</th>
                                                <th class="cell" style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--//app-wrapper-->

    <style>
        #faq-list_wrapper {
            margin: 20px;
        }
        .table th,
        .table td {
            vertical-align: middle !important;
            text-align: center !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            var table = $('#faq-list').DataTable({
                processing: false,
                serverSide: true,
                searching: true,
                info: true,
                order: true,
                paging: true,
                ajax: "{{ route('faq.index') }}",
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    info: "Total: _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 hingga 0 dari 0 data"
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'judul_id',
                        name: 'judul_id'
                    },
                    {
                        data: 'deskripsi_id',
                        name: 'deskripsi_id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return data.substring(0,
                                50);
                        }
                    },
                    {
                        data: 'judul_en',
                        name: 'judul_en'
                    },
                    {
                        data: 'deskripsi_en',
                        name: 'deskripsi_en',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return data.substring(0,
                                50);
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('body').on('click', '.deleteFaq', function() {
                var faq_id = $(this).data("id");
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
                            url: "{{ route('faq.index') }}" + '/' + faq_id,
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
                                    text: 'Terjadi Kesalahaan Saat Menghapus',
                                });
                            }
                        });
                    }
                });
            });

            $('body').on('click', '.editFaq', function() {
                var faq_id = $(this).data('id');
                window.location.href = 'faq/' + faq_id + '/edit';
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
