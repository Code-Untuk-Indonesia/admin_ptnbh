<script>
    $(document).ready(function() {
        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formAlbum').submit(function(e) {
            e.preventDefault();

            $('#saveBtn').prop('disabled', true);

            var formData = new FormData(this);

            $('#formAlbum').submit(function(e) {
                e.preventDefault();

                $('#saveBtn').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "{{ isset($album) ? route('album.update', $album->id) : route('album.store') }}",
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
