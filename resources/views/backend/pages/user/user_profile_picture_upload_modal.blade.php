{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profilePictureUploadModal">
    Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="profilePictureUpdateModal" tabindex="-1" aria-labelledby="profilePictureUpdateModalLabel"
    aria-hidden="true">
    <form action="{{ route("user.update_profile_picture", $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($user->pro_pic)
                        <h5 class="modal-title" id="profilePictureUpdateModalLabel">Update Profile Picture</h5>
                    @else
                        <h5 class="modal-title" id="profilePictureUpdateModalLabel">Upload Profile Picture</h5>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="dropZone" class="drop-zone ">
                        <img src="{{ asset("image/no_image.png") }}" alt="Image upload"
                            style="max-width: 100%; max-height: 200px;">
                        <p>Drag & drop an image here or click to select one.</p>

                        @if ($errors->has("pro_pic"))
                            <p class="text-danger">{{ $errors->first("pro_pic") }}</p>
                        @endif

                    </div>
                    <input type="file" name='pro_pic' id="imageInput" accept="image/*" style="display: none;">
                    <img id="imagePreview" class="border border-1 rounded p-1" src=""
                        style="max-width: 100%; max-height: 200px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fa-solid fa-xmark"></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="saveButton"><i
                            class="fa-solid fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const dropZone = document.getElementById("dropZone");
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");
    const saveButton = document.getElementById("saveButton");

    // Prevent the default behavior for drag-and-drop
    dropZone.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZone.classList.add("drag-over");
    });

    dropZone.addEventListener("dragleave", () => {
        dropZone.classList.remove("drag-over");
    });

    dropZone.addEventListener("drop", (e) => {
        e.preventDefault();
        dropZone.classList.remove("drag-over");
        const file = e.dataTransfer.files[0];
        if (file) {
            loadImage(file);
        }
    });

    dropZone.addEventListener("click", () => {
        imageInput.click();
    });

    imageInput.addEventListener("change", () => {
        const file = imageInput.files[0];
        if (file) {
            loadImage(file);
        }
    });

    function loadImage(file) {
        const reader = new FileReader();

        reader.onload = (e) => {
            imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }

    // Add an event listener to the save button (customize as needed)
    saveButton.addEventListener("click", () => {
        // Handle saving the image here
        // You can use imageInput.files[0] to access the selected file
    });
</script>
