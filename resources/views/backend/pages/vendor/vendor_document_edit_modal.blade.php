{{-- @include("includes.toastr_script") --}}
<!-- Modal for updating a specific document -->
@foreach ($documents as $document)
    <div class="modal fade" id="updateDocumentModal_{{ $document->id }}" tabindex="-1" aria-labelledby="updateDocumentModalLabel" aria-hidden="true">
        <form action="{{ route("document.update", $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateDocumentModalLabel">Update Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="update-inputs-container">
                            <label for="keyword">Keyword:</label>
                            <input value="{{ $document->keyword }}" placeholder="Enter Keyword" type="text" name="keyword" class="form-control mb-3" id="keyword" required>
                            {{-- @if ($errors->any())
                                <script>
                                    $(document).ready(function() {
                                        @foreach ($errors->all() as $error)
                                            toastr.error("{{ $error }}");
                                        @endforeach
                                    });
                                </script>
                            @endif --}}
                            <!--error message is working on this model here from upload document-->
                            <input type="file" name="document" class="form-control mb-3" id="document" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endforeach
