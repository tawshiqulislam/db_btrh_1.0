<!-- Modal -->
<div class="modal fade" id="project_initiation_time_Modal" tabindex="-1" aria-labelledby="project_initiation_time_ModalLabel" aria-hidden="true">
    <form action="{{ route("set_time.store", $project_initiation->id) }}" method='POST'>
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_initiation_time_ModalLabel">Set Time {{ $project_initiation->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="starting_date">Starting Date:</label>
                            <input type="date" name="starting_date" id="starting_date" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="ending_date">Ending Date:</label>
                            <input type="date" name="ending_date" id="ending_date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Set Time</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').change(function() {
            var userId = $(this).val();
            $('#designation_' + userId).toggle();
            $('#comment_' + userId).toggle();
        });

        $('#user_type').on('change', function() {
            var userType = $(this).val();
            if (userType === 'user') {
                $('#user_fields').show();
                $('#vendor_fields').hide();
            } else if (userType === 'vendor') {
                $('#user_fields').hide();
                $('#vendor_fields').show();
            }
        });
    });
</script>
