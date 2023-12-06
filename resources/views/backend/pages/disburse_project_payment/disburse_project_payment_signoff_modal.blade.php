<!-- Modal -->
<div class="modal fade" id="projectSignOffModal" tabindex="-1" aria-labelledby="projectSignOffModalLabel" aria-hidden="true">
    <form action="{{ route("signoff_project.store", $disburse_project_payment->id) }}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectSignOffModalLabel">
                        Sign Off {{ $disburse_project_payment->project_initiation->name }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="description">Project Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="file">Project File</label>
                            <input type="file" name="file" id="file" class="form-control">
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
