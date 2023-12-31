<!-- Modal -->
<div class="modal fade" id="vendorRoleDeleteModal" tabindex="-1" aria-labelledby="vendorRoleDeleteModalLabel" aria-hidden="true">
    <form action="{{ route("vendor.role_delete", $vendor->id) }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorRoleDeleteModalLabel">Remove Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($vendor->roles as $role)
                        <div class="form-check">
                            <input class="form-check-input" name='roles[]' type="checkbox" value="{{ $role->name }}" id="flexCheckDefault_{{ $role->id }}" required>
                            <label class="form-check-label" for="flexCheckDefault_{{ $role->id }}">
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Remove</button>
                </div>
            </div>
        </div>
    </form>
</div>
