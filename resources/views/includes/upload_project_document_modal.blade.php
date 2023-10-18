{{-- @include("includes.toastr_script") --}}
<!-- Modal -->

<div class="modal fade" id="projectDocumentModal" tabindex="-1" aria-labelledby="projectDocumentModalLabel" aria-hidden="true">
    <form action="{{ route("project_document.store", $project_initiation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectDocumentModalLabel">Upload Project Documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="file-inputs-container">
                        <label for="keyword">Keyword:</label>
                        <input placeholder="Enter Keyword" type="text" name="keyword" class="form-control mb-3" id="keyword" required>
                        {{-- @if ($errors->any())
                            <script>
                                $(document).ready(function() {
                                    @foreach ($errors->all() as $error)
                                        toastr.error("{{ $error }}");
                                    @endforeach
                                });
                            </script>
                        @endif --}}
                        <input type="file" name="document" class="form-control mb-3" id="document" required>
                    </div>
                    {{-- <a type="button" class="btn btn-primary btn-sm" id="add-more">Add More</a>
                    <a type="button" class="btn btn-danger btn-sm" id="remove-last">Remove</a> --}}
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const addMoreButton = document.getElementById("add-more");
        const removeLastButton = document.getElementById("remove-last");
        const fileInputsContainer = document.getElementById("file-inputs-container");

        addMoreButton.addEventListener("click", function() {
            const newKeywordInput = document.createElement("input");
            newKeywordInput.type = "text";
            newKeywordInput.name = "keywords[]";
            newKeywordInput.className = "form-control mb-3";
            newKeywordInput.placeholder = "Enter Keyword";
            newKeywordInput.id = "keyword";

            const newDocumentInput = document.createElement("input");
            newDocumentInput.type = "file";
            newDocumentInput.name = "documents[]";
            newDocumentInput.className = "form-control mb-3";
            newDocumentInput.id = "document";

            fileInputsContainer.appendChild(newKeywordInput);
            fileInputsContainer.appendChild(newDocumentInput);
        });

        removeLastButton.addEventListener("click", function() {
            const inputElements = fileInputsContainer.querySelectorAll('input[name="keywords[]"], input[name="documents[]"]');

            if (inputElements.length > 2) {
                const lastKeywordInput = inputElements[inputElements.length - 2];
                const lastDocumentInput = inputElements[inputElements.length - 1];
                fileInputsContainer.removeChild(lastKeywordInput);
                fileInputsContainer.removeChild(lastDocumentInput);
            }
        });
    });
</script> --}}
