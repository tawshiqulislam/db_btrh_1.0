<!-- Modal -->
<div class="modal fade" id="vendorRoleAssignModal" tabindex="-1" aria-labelledby="vendorRoleAssignModalLabel" aria-hidden="true">
    <form action="{{ route("vendor.role_assign", $vendor->id) }}" method='POST'>
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorRoleAssignModalLabel">Assign Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="vendorRoleAssign">Roles:</label>
                    <select name="name" id="vendorRoleAssign" class="form-control" required>
                        <option selected disabled>Select</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </div>
        </div>
    </form>
</div>
