<!-- Modal -->
<div class="modal fade" id="resourceAssignUserModal" tabindex="-1" aria-labelledby="resourceAssignUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route("resource.assign_user", $resource->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resourceAssignUserModalLabel">Assign to User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="user_id">User:</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option selected disabled>Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Assign</button>
                </div>
            </div>
        </form>
    </div>
</div>
