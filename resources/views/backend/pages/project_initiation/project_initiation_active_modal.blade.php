<!-- Modal -->
<div class="modal fade" id="project_initiation_active_Modal" tabindex="-1" aria-labelledby="project_initiation_active_ModalLabel" aria-hidden="true">
    <form action="{{ route("project_initiation.activate", $project_initiation->id) }}" method='POST'>
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_initiation_active_ModalLabel">Activate {{ $project_initiation->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="assigned_to">Assigned To:</label>
                            <select name="assigned_to" id="assigned_to" class="form-control" required>
                                <option selected disabled>Select</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="status">Select Status:</label>
                            <select name="status" id="statis" class="form-control" required>
                                <option selected disabled>Select</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->status }}">{{ ucfirst($status->status) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Active</button>
                </div>
            </div>
        </div>
    </form>
</div>
