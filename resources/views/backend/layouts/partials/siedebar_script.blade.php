<script>
    // console.log(document.querySelectorAll('[data-bs-toggle="collapse"]'));
    // console.log($('.nav-item a[data-bs-toggle="collapse"]')[0].click());

    $(document).ready(function() {
        try {
            
            var url = window.location.href;
            console.log(url);

            // Add 'active' class to the corresponding sidebar link
            $('.sidebar-nav .nav-content a').removeClass('active');

            var child = $('.nav-content-item[href="' + url + '"]');
            var clickParent = child[0].parentNode.parentNode.previousElementSibling;
            $('.sidebar-nav .nav-content .nav-content-item[href="' + url + '"]').addClass('active');
            clickParent.click();

        } catch (error) {
            console.log(error.name);
        }
    });
</script>
