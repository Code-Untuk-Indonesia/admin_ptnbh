<script>
    $(document).ready(function() {
        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formBerita').submit(function(e) {
            e.preventDefault();

            var formData = new FormData();

            // Ambil data dari formulir
            var gambarBerita = $('#gambar-berita')[0].files[0];
            var judulBerita = $('#judul').val();
            var kontenBerita = $('#summernote').val();

            // Tambahkan data ke formData
            formData.append('gambar-berita', gambarBerita);
            formData.append('judul', judulBerita);
            formData.append('konten', kontenBerita);

            $.ajax({
                type: 'POST',
                url: "{{ route('berita.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle response dari server, mungkin menampilkan pesan sukses atau meredirect pengguna
                    console.log(response);
                    // Tampilkan Sweet Alert jika berhasil
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect ke halaman berita
                            window.location.href = "{{ route('berita.index') }}";
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error, mungkin menampilkan pesan error atau memberikan feedback kepada pengguna
                    console.error(xhr.responseText);
                    // Tampilkan Sweet Alert jika terjadi error
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan berita. Silakan coba lagi!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
