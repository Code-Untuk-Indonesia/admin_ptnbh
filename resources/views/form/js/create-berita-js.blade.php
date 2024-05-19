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
                    complete: function() {
                        $('#saveBtn').prop('disabled', false);
                    }
                });
            });
        });
    });
</script>
