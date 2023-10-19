@foreach ($project_initiations as $project_initiation)
    <!-- Modal -->
    <div class="modal fade" id="project_initiationDeleteModal_{{ $project_initiation->id }}" tabindex="-1" aria-labelledby="project_initiationDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_initiationDeleteModalLabel_{{ $project_initiation->id }}">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this project initiation?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route("project_initiation.delete", $project_initiation->id) }}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
