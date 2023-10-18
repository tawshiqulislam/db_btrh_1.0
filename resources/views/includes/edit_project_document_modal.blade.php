<!-- Modal -->
@foreach ($project_initiation->project_documents as $project_document)
    <div class="modal fade" id="updateProjectDocumentModal_{{ $project_document->id }}" tabindex="-1" aria-labelledby="updateProjectDocumentModalLabel" aria-hidden="true">
        <form action="{{ route("project_document.update", $project_document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateProjectDocumentModalLabel">Update Project Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="file-inputs-container">
                            <label for="keyword">Keyword:</label>
                            <input value="{{ $project_document->keyword }}" placeholder="Enter Keyword" type="text" name="keyword" class="form-control mb-3" id="keyword" required>

                            <input type="file" name="document" class="form-control mb-3" id="document" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endforeach
