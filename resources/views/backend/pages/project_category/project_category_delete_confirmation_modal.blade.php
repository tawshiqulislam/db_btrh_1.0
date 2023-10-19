@foreach ($project_categorys as $project_category)
    <!-- Modal -->
    <div class="modal fade" id="project_categoryDeleteModal_{{ $project_category->id }}" tabindex="-1" aria-labelledby="project_categoryDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_categoryDeleteModalLabel_{{ $project_category->id }}">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this project category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route("project_category.delete", $project_category->id) }}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
