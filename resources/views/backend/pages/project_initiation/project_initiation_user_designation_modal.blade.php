<!-- Modal -->
@foreach ($project_initiation_overviews as $key => $project_initiation_overview)
    <div class="modal fade" id="project_initiation_user_designation_Modal_{{ $project_initiation_overview->id }}" tabindex="-1" aria-labelledby="project_initiation_user_designation_ModalLabel"
        aria-hidden="true">
        <form action="{{ route("user_designation.store", $project_initiation_overview->id) }}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="project_initiation_user_designation_ModalLabel">Designation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="subject">Subject:</label>
                                <select name="name" id="name" class="form-control">
                                    <option selected disabled>Select one</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->name }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Assign Designation</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endforeach
