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
                    success: function(data) {
                        Swal.fire({
                            title: 'Berhasil',
                            icon: 'success',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.href =
                                "{{ route('berita.index') }}";
                        });
                    },
                    error: function(xhr, status, error) {
                        let errorMessage =
                            'Terjadi kesalahan saat menyimpan berita. Silakan coba lagi!';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            title: 'Error!',
                            text: errorMessage,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    },
                    complete: function() {
                        $('#saveBtn').prop('disabled', false);
                    }
                });
            });
        });
    });
</script>
