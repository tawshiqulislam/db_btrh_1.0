<script>
    // console.log(document.querySelectorAll('[data-bs-toggle="collapse"]'));
    // console.log($('.nav-item a[data-bs-toggle="collapse"]')[0].click());

    $(window).on("load", function() {
        var url = window.location.href;

        // Add 'active' class to the corresponding sidebar link
        $('.sidebar-nav .nav-content a').removeClass('active');
        $('.sidebar-nav .nav-content .nav-content-item[href="' + url + '"]').addClass('active');

        var child = $('.nav-content-item[href="' + url + '"]');
        var clickParent = child[0].parentNode.parentNode.previousElementSibling;
        clickParent.click();
        // console.log();
    });
</script>
