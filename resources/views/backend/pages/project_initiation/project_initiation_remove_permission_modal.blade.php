<!-- Modal -->
@foreach ($project_initiation_overviews as $key => $project_initiation_overview)
    <div class="modal fade" id="remove_permissionModal_{{ $project_initiation_overview->id }}" tabindex="-1" aria-labelledby="remove_permissionModalLabel" aria-hidden="true">
        <form action="{{ route("user_remove_permission.delete", $project_initiation_overview->user->id) }}" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="remove_permissionModalLabel_{{ $project_initiation_overview->id }}">Permission List</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @foreach ($project_initiation_overview->user->permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remove_permission_{{ $project_initiation_overview->id }}_{{ $permission->id }}" name="permissions[]"
                                    value="{{ $permission->name }}">
                                <label class="form-check-label" for="remove_permission_{{ $project_initiation_overview->id }}_{{ $permission->id }}">{{ $permission->name }}</label>
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
@endforeach
