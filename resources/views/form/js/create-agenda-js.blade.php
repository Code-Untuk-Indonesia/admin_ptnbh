<script>
    $(document).ready(function() {
        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formAgenda').submit(function(e) {
            e.preventDefault();

            $('#saveBtn').prop('disabled', true);

            var formData = new FormData(this);

            $('#formAgenda').submit(function(e) {
                e.preventDefault();

                $('#saveBtn').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "{{ isset($agenda) ? route('agenda.update', $agenda->id) : route('agenda.store') }}",
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
