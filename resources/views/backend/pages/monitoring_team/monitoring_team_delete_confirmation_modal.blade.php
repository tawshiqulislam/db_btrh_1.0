@foreach ($monitoring_teams as $monitoring_team)
    <!-- Modal -->
    <div class="modal fade" id="monitoring_teamDeleteModal_{{ $monitoring_team->id }}" tabindex="-1" aria-labelledby="monitoring_teamDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monitoring_teamDeleteModalLabel_{{ $monitoring_team->id }}">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this monitoring team?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route("monitoring_team.delete", $monitoring_team->id) }}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
