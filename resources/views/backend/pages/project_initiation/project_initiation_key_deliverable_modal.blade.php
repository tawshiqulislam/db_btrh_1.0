<!-- Modal -->

<div class="modal fade" id="project_initiation_key_deliverable_Modal" tabindex="-1" aria-labelledby="project_initiation_key_deliverable_ModalLabel" aria-hidden="true">
    <form action="{{ route("key_deliverable.store", $project_initiation->id) }}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_initiation_key_deliverable_ModalLabel">Create Issue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="subject">Subject:</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder='Enter subject' required>
                        </div>
                        <div class="col-md-12">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder='Breifly describe' required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="document">Document:</label>
                            <input type="file" name="document" id="document" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Send Key Deliver</button>
                </div>
            </div>
        </div>
    </form>
</div>
