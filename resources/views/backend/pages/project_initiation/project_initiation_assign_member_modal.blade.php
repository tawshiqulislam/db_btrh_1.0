<!-- Modal -->
<div class="modal fade" id="project_initiation_assign_member_Modal" tabindex="-1" aria-labelledby="project_initiation_assign_member_ModalLabel" aria-hidden="true">
    <form action="{{ route("assign_member.store", $project_initiation->id) }}" method='POST'>
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_initiation_assign_member_ModalLabel">Assign {{ $project_initiation->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="user_type">User Type:</label>
                            <select id="user_type" name="user_type" class="form-control">
                                <option value="" selected disabled>Select One</option>
                                <option value="user">User</option>
                                <option value="vendor">Vendor</option>
                            </select>
                        </div>
                        <div class="col-md-12" id="user_fields" style="display: none;">
                            <label for="assigned_to">Assigned To:</label>
                            @foreach ($users as $user)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="user_ids[]" value="{{ $user->id }}" id="user_{{ $user->id }}">
                                    <label class="form-check-label" for="user_{{ $user->id }}">
                                        {{ $user->name }} ({{ $user->email }})
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-12" id="vendor_fields" style="display: none;">
                            <label for="assigned_to">Assigned To:</label>
                            @foreach ($vendors as $vendor)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="user_ids[]" value="{{ $vendor->id }}" id="user_{{ $vendor->id }}">
                                    <label class="form-check-label" for="user_{{ $vendor->id }}">
                                        {{ $vendor->name }} ({{ $vendor->email }})
                                    </label>
                                    <input type="text" class="form-control designation-input mb-2" id="designation_{{ $vendor->id }}" name="designations[{{ $vendor->id }}]"
                                        placeholder="Enter Designation" style="display: none;">
                                    <input type="text" class="form-control comment-input" id="comment_{{ $vendor->id }}" name="comments[{{ $vendor->id }}]" placeholder="Enter Comment"
                                        style="display: none;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function () {
            // Function to show/hide fields based on the selected user type
            function toggleFields(userType) {
                if (userType === 'user') {
                    $('#user_fields').show();
                    $('#vendor_fields').hide();
                    $('.vendor-input').hide(); // hide vendor-specific inputs
                } else if (userType === 'vendor') {
                    $('#user_fields').hide();
                    $('#vendor_fields').show();
                    $('.vendor-input').show(); // show vendor-specific inputs
                } else {
                    $('#user_fields').hide();
                    $('#vendor_fields').hide();
                    $('.vendor-input').hide(); // hide vendor-specific inputs
                }
            }

            // Initial state on document load
            toggleFields('');

            // Change event handler for the user type dropdown
            $('#user_type').change(function () {
                var selectedUserType = $(this).val();
                toggleFields(selectedUserType);
            });
        });
    </script>
