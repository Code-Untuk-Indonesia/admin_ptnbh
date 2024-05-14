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
            
            $('#saveBtn').prop('disabled', true);

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ isset($berita) ? route('berita.update', $berita->id) : route('berita.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
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
