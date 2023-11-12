<!--jquery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!--ajax-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<!--nice admin script-->
<script src="{{ asset("ui/backend") }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset("ui/backend") }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset("ui/backend") }}/assets/vendor/chart.js/chart.umd.js"></script>
<script src="{{ asset("ui/backend") }}/assets/vendor/echarts/echarts.min.js"></script>
<script src="{{ asset("ui/backend") }}/assets/vendor/quill/quill.min.js"></script>
<script src="{{ asset("ui/backend") }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="{{ asset("ui/backend") }}/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="{{ asset("ui/backend") }}/assets/vendor/php-email-form/validate.js"></script>
<script src="{{ asset("ui/backend") }}/assets/js/main.js"></script>
