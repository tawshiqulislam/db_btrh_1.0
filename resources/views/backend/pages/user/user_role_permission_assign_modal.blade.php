<!-- Modal -->
<div class="modal fade" id="userRolePermissionAssignModal_{{ $user->id }}" tabindex="-1" aria-labelledby="userRolePermissionAssignModalLabel" aria-hidden="true">
    <form action="{{ route("role_permission_assign.store", $user->id) }}" method='POST'>
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userRolePermissionAssignModalLabel_{{ $user->id }}">Assign Role & Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label for="usrRoleAssign">Roles:</label>
                            <div class="row">
                                @foreach ($roles as $key => $role)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="role_{{ $key }}_{{ $user->id }}" name="roles[]" value="{{ $role->name }}">
                                            <label class="form-check-label" for="role_{{ $key }}_{{ $user->id }}">{{ $role->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="userPermissionAssign">Permissions:</label>
                            <div class="row">
                                @foreach ($permissions as $key => $permission)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="permission_{{ $key }}_{{ $user->id }}" name="permissions[]"
                                                value="{{ $permission->name }}">
                                            <label class="form-check-label" for="permission_{{ $key }}_{{ $user->id }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </div>
        </div>
    </form>
</div>
