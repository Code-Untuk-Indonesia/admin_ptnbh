<script>
    $(document).ready(function() {
        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formPengumuman').submit(function(e) {
            e.preventDefault();

            $('#saveBtn').prop('disabled', true);

            var formData = new FormData(this);

            $('#formPengumuman').submit(function(e) {
                e.preventDefault();

                $('#saveBtn').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "{{ isset($pengumuman) ? route('pengumuman.update', $pengumuman->id) : route('pengumuman.store') }}",
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
