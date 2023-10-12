<script>
    // JavaScript to show the uploaded image
    document.getElementById('pro_pic').addEventListener('change', function() {
        var uploadedImage = document.getElementById('uploaded_image');
        var fileInput = document.getElementById('pro_pic');

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                uploadedImage.src = e.target.result;
                uploadedImage.style.display = 'block';
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>
