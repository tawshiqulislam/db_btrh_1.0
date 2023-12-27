<!-- Button trigger modal -->
@foreach ($project_initiation_overviews as $project_initiation_overview)
    <!-- Modal -->
    <div class="modal fade" id="remove_team_member_Modal_{{ $project_initiation_overview->id }}" tabindex="-1" aria-labelledby="remove_team_member_ModalLabel" aria-hidden="true">
        <form action="{{ route("delete_assigned_user.delete", $project_initiation_overview->id) }}" method='POST'>
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="remove_team_member_ModalLabel_{{ $project_initiation_overview->id }}">Remove Team Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="for-group">
                                <div class="col-md-12">
                                    <label for="remove_team_member">Why you are removing this team member?</label>
                                    <textarea name="reason" id="remove_team_member" cols="30" rows="10" class="form-control" placeholder="Provide a valid reason..." required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endforeach
