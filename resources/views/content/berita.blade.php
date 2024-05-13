@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Orders</h1>
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


                <a class="btn app-btn-secondary mb-2" href="/create-berita">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" width="1.5em" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
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
                                                <th class="cell">No</th>
                                                <th class="cell">Gambar</th>
                                                <th class="cell">Judul</th>
                                                <th class="cell">Konten</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="berita-list">
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->

                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                        <nav class="app-pagination">
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
                        </nav><!--//app-pagination-->

                    </div><!--//tab-pane-->


                </div><!--//tab-content-->



            </div><!--//container-fluid-->
        </div><!--//app-content-->



    </div><!--//app-wrapper-->

    <script>
        $(document).ready(function() {
            // Memuat data berita saat halaman dimuat
            loadBeritaData();
    
            function loadBeritaData() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('berita.index') }}",
                    success: function(response) {
    
                        // Menambahkan data berita ke dalam tabel
                        $.each(response, function(index, berita) {
                            // Mengubah format tanggal menjadi hari dan tanggal dalam bahasa Indonesia
                            var tanggal = new Date(berita.created_at);
                            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                            var formattedTanggal = tanggal.toLocaleDateString('id-ID', options);
    
                            // Memotong konten menjadi 50 karakter pertama
                            var kontenPendek = berita.konten.substring(0, 50) + (berita.konten.length > 50 ? '...' : '');
    
                            var row = '<tr>' +
                                '<td class="cell">' + (index + 1) + '</td>' +
                                '<td class="cell"><img src="/' + berita.gambar + '" alt="Gambar Berita" style="max-width: 100px;"></td>' +
                                '<td class="cell">' + berita.judul + '</td>' +
                                '<td class="cell">' + kontenPendek + '</td>' +
                                '<td class="cell">' + formattedTanggal + '</td>' +
                                '<td class="cell">' +
                                '<a class="btn-sm app-btn-danger" href="#">Hapus</a>' +
                                '<a class="btn-sm app-btn-primary" href="#">Edit</a>' +
                                '</td>' +
                                '</tr>';
                            $('#berita-list').append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Menampilkan pesan error jika terjadi kesalahan saat memuat data
                        alert('Terjadi kesalahan saat memuat data berita. Silakan coba lagi!');
                    }
                });
            }
        });
    </script>
    
    
    
@endsection
