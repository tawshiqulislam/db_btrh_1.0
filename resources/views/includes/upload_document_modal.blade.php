<!-- Modal -->
<div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
    <form action="{{ route("upload_document.store", $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentModalLabel">Upload Documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="file-inputs-container">
                        <input type="file" name="documents[]" class="form-control mb-3" id="document">
                    </div>
                    <a type="button" class="btn btn-primary btn-sm" id="add-more">Add More</a>
                    <a type="button" class="btn btn-danger btn-sm" id="remove-last">Remove</a>
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addMoreButton = document.getElementById("add-more");
        const removeLastButton = document.getElementById("remove-last");
        const fileInputsContainer = document.getElementById("file-inputs-container");

        addMoreButton.addEventListener("click", function() {
            const newInput = document.createElement("input");
            newInput.type = "file";
            newInput.name = "documents[]";
            newInput.className = "form-control mb-3";
            newInput.id = "documents";
            fileInputsContainer.appendChild(newInput);
        });

        removeLastButton.addEventListener("click", function() {
            const inputElements = fileInputsContainer.querySelectorAll('input[name="documents[]"]');

            if (inputElements.length > 1) {
                const lastInput = inputElements[inputElements.length - 1];
                fileInputsContainer.removeChild(lastInput);
            }
        });
    });
</script>
