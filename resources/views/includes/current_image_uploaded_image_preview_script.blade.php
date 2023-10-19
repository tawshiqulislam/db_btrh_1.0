<script>
    document.getElementById('pro_pic').addEventListener('change', function() {
        var input = this;
        var currentImage = document.getElementById('current_image');
        var uploadedImage = document.getElementById('uploaded_image');
        var uploadedImageDisplay = document.getElementById('uploaded_image_display');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                currentImage.style.display = 'none';
                uploadedImage.style.display = 'block';
                uploadedImageDisplay.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
