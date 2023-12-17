<!-- Modal -->
<div class="modal fade" id="userRolePermissionDeleteModal_{{ $user->id }}" tabindex="-1" aria-labelledby="userRolePermissionDeleteModalLabel" aria-hidden="true">
    <form action="{{ route("role_permission_delete.delete", $user->id) }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userRolePermissionDeleteModalLabel_{{ $user->id }}">Remove Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label for="usrRoleAssign">Roles:</label>
                            <div class="row">
                                @foreach ($user->roles as $key => $role)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="role_{{ $key }}_{{ $role->id }}" name="roles[]" value="{{ $role->name }}">
                                            <label class="form-check-label" for="role_{{ $key }}_{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="userPermissionAssign">Permissions:</label>
                            <div class="row">
                                @foreach ($user->permissions as $key => $permission)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="permission_{{ $key }}_{{ $permission->id }}" name="permissions[]"
                                                value="{{ $permission->name }}">
                                            <label class="form-check-label" for="permission_{{ $key }}_{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Remove</button>
                </div>
            </div>
        </div>
    </form>
</div>
