@include("backend.layouts.partials.script")
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            let search_string = $(this).val();
            if (search_string.length === 0) {
                // Reload the page
                location.reload();
            }

            $.ajax({
                url: "{{ route("project_initiation.search") }}",
                method: 'GET',
                data: {
                    search_string: search_string
                },
                success: function(res) {
                    $('.table-data').html(res);
                    if (res.status === 'nothing_found') {
                        $('.table-data').html(
                            '<span class="text-danger">Nothing Found</span>');
                    }
                }
            });
        });
    });
</script>
