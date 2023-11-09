<!-- Modal -->
<div class="modal fade" id="resourceAssignProjectModal" tabindex="-1" aria-labelledby="resourceAssignProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route("resource.assign_project", $resource->id) }}" method='POST'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resourceAssignProjectModalLabel">Assign to Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="project_initiation_id">Project Initiation:</label>
                            <select name="project_initiation_id" id="project_initiation_id" class="form-control" required>
                                <option selected disabled>Select Project Initiation</option>
                                @foreach ($project_initiations as $project_initiation)
                                    <option value="{{ $project_initiation->id }}">{{ $project_initiation->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </div>
        </form>
    </div>
</div>
