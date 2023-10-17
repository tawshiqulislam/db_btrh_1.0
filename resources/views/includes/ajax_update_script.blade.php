@include("backend.layouts.partials.script")
<script>
    //edit
    $(document).on('click', '.editBtn', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let description = $(this).data('description');

        $('#update_id').val(id);
        $('#update_name').val(name);
        $('#update_description').val(description);
    });
</script>
