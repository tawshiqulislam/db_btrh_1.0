<!-- Modal -->
<div class="modal fade" id="projectSubmissionModal" tabindex="-1" aria-labelledby="projectSubmissionModalLabel" aria-hidden="true">
    <form action="{{ route("project_submission.store", $project_initiation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectSubmissionModalLabel">Submit {{ $project_initiation->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Description Field -->
                        <div class="col-md-12 form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" placeholder='Enter project description' id="description" name="description" required></textarea>
                            @if ($errors->has("description"))
                                <p class="text-danger">{{ $errors->first("description") }}</p>
                            @endif
                        </div>

                        <!-- Comment Field -->
                        <div class="col-md-12 form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" placeholder="Enter comment" id="comment" name="comment" required></textarea>
                            @if ($errors->has("comment"))
                                <p class="text-danger">{{ $errors->first("comment") }}</p>
                            @endif
                        </div>

                        <!-- File Field -->
                        <div class="col-md-12 form-group">
                            <label for="file">File:</label>
                            <input type="file" class="form-control" id="file" name="file">
                            @if ($errors->has("file"))
                                <p class="text-danger">{{ $errors->first("file") }}</p>
                            @endif
                        </div>

                        <!-- Link Field -->
                        <div class="col-md-12 form-group">
                            <label for="link">Link:</label>
                            <input type="text" placeholder="Enter project uploaded file link" class="form-control" id="link" name="link" required>
                            @if ($errors->has("link"))
                                <p class="text-danger">{{ $errors->first("link") }}</p>
                            @endif
                        </div>

                        <!-- Status Field -->
                        <div class="col-md-12 form-group mb-2">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control" required>
                                <option selected disabled>Select One</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->status }}">{{ $status->status }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has("status"))
                                <p class="text-danger">{{ $errors->first("status") }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Project</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
