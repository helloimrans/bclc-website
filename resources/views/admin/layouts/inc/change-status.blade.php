<script>
    $(document).ready(function() {
        $(document).on('change', '.change-status-checkbox', function() {
            let id = $(this).data('id');
            let table = $(this).data('table');
            let column = $(this).data('column');
            let status = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('change.status') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    table: table,
                    column: column,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    }else{
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    toastr.error('Something went wrong!');
                }
            });
        });
    });
</script>
