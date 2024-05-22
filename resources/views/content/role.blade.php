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
                                            <input type="text" id="search-roles" name="searchroles" class="form-control search-roles" placeholder="Search">
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
                                    <a class="btn app-btn-secondary" href="{{ route('roles.create') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" width="1.5em" viewBox="0 0 448 512">
                                            <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                        </svg>
                                        Tambah Role
                                    </a>
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->

                <div class="tab-content" id="roles-table-tab-content">
                    <div class="tab-pane fade show active" id="roles-all" role="tabpanel" aria-labelledby="roles-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="role-list" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="cell" style="text-align: center;">Role</th>
                                                <th class="cell" style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be populated by DataTables -->
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                        <nav class="app-pagination">
                            <ul class="pagination justify-content-center">
                                <!-- Pagination will be handled by DataTables -->
                            </ul>
                        </nav><!--//app-pagination-->
                    </div><!--//tab-pane-->
                </div><!--//tab-content-->
            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div><!--//app-wrapper-->

    <script>
        $(document).ready(function() {
            var table = $('#role-list').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                info: true,
                paging: true,
                ajax: "{{ route('roles.index') }}",
                columns: [
                    { data: 'name', name: 'name' },
                    { 
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <a href="roles/${row.id}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger deleteRole" data-id="${row.id}">Delete</button>
                            `;
                        }
                    }
                ]
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
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
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
