<!-- Modal -->

<div class="modal fade" id="remove_permissionModal_{{ $user->id }}" tabindex="-1" aria-labelledby="remove_permissionModalLabel" aria-hidden="true">
    <form action="{{ route("user_remove_permission.delete", $user->id) }}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remove_permissionModalLabel_{{ $user->id }}">Permission List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @foreach ($user->permissions as $key => $permission)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remove_permission_{{ $key }}" name="permissions[]" value="{{ $permission->name }}">
                            <label class="form-check-label" for="remove_permission_{{ $key }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Remove Permission</button>
                </div>
            </div>
        </div>
    </form>
</div>
