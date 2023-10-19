@foreach ($users as $user)
    <!-- Modal -->
    <div class="modal fade" id="userDeleteModal_{{ $user->id }}" tabindex="-1" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDeleteModalLabel_{{ $user->id }}">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route("user.delete", $user->id) }}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
