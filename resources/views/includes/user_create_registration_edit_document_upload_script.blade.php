<script>
    document.addEventListener('DOMContentLoaded', function() {
        var userTypes = document.getElementsByName('user_type');
        var documentInput = document.getElementById('document');
        for (var i = 0; i < userTypes.length; i++) {
            userTypes[i].addEventListener('change', function() {
                if (this.value === 'vendor') {
                    document.getElementById('document_div').style.display = 'block';
                    // documentInput.required = true;
                } else {
                    document.getElementById('document_div').style.display = 'none';
                    // documentInput.required = false;
                }
            });
        }
    });
</script>
