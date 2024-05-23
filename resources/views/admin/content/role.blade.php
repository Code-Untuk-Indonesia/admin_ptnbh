@extends('admin-template.navbar-footer')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ $title }}</h1>
                    </div>
                </div>

                <a class="btn app-btn-secondary" href="{{ route('roles.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" width="1.5em" viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Tambah Role
                </a>

                <div class="tab-content" id="roles-table-tab-content">
                    <div class="tab-pane fade show active" id="roles-all" role="tabpanel" aria-labelledby="roles-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="role-list"
                                        style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="cell" style="text-align: center;">Role</th>
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
    </div>

    <style>
        #role-list_wrapper {
            margin: 20px;
        }
    </style>


    <script>
        $(document).ready(function() {
            var table = $('#role-list').DataTable({
                processing: false,
                serverSide: true,
                searching: false,
                info: false,
                order: true,
                paging: false,
                ajax: {
                    url: "{{ route('roles.index') }}",
                    data: function(d) {
                        d.search = $('#search-roles').val();
                        d.time_period = $('#filter-time-period').val();
                    }
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ]
            });

            $('#search-roles').on('keyup', function() {
                table.draw();
            });

            $('#filter-time-period').on('change', function() {
                table.draw();
            });

            $('body').on('click', '.deleteRole', function() {
                var role_id = $(this).data("id");
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
                            url: "{{ route('roles.index') }}" + '/' + role_id,
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

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1000
                });
            @endif
        });
    </script>
@endsection
