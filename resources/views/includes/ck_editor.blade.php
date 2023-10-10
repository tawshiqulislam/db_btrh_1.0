<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    //project initiation description
    ClassicEditor
        .create(document.getElementById('editor_1'))
        .catch(error => {
            console.error(error);
        });
    //project initiation goal
    ClassicEditor
        .create(document.getElementById('editor_2'))
        .catch(error => {
            console.error(error);
        });
</script>
