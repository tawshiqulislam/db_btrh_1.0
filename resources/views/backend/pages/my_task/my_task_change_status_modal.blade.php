<!-- Modal -->
<div class="modal fade" id="myTaskChangeStatusModal" tabindex="-1" aria-labelledby="myTaskChangeStatusModalLabel" aria-hidden="true">
    <form action="{{ route("change_my_task_status.update", $my_task->id) }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myTaskChangeStatusModalLabel">My Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="status">Change Task Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option selected disabled>Select One</option>
                        @foreach ($statuss as $status)
                            <option value="{{ $status->status }}">{{ $status->status }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
