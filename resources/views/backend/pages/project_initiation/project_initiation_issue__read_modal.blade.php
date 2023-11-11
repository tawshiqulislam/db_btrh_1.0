<!-- Modal -->
@foreach ($project_initiation->key_deliveres as $key => $key_delivery)
    <div class="modal fade" id="project_initiation_issue_read_Modal_{{ $key_delivery->id }}" tabindex="-1" aria-labelledby="project_initiation_issue_read_ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_initiation_issue_read_ModalLabel">{{ $key_delivery->subject }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="message">Message:</label>
                            <p>{{ $key_delivery->message }}</p>
                        </div>
                        <div class="col-md-12">
                            <label for="document">Document:</label>
                            <a href="{{ asset("storage/project_initiation/" . $key_delivery->document) }}">{{ $key_delivery->document }}</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
        </form>
    </div>
@endforeach
