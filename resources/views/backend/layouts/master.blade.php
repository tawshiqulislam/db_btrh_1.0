<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dhaka Bank</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        {{-- niceadmin cdn --}}
        @include("backend.layouts.partials.cdn")
    </head>

    <body>

        <!-- End Header -->
        @include("backend.layouts.partials.navbar")
        <!-- ======= Sidebar ======= -->
        @include("backend.layouts.partials.sidebar")

        <main id="main" class="main">

            <!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                    @yield("content")

                </div>
            </section>

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        @include("backend.layouts.partials.footer")
        <!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        @include("backend.layouts.partials.script")
        @include('backend.layouts.partials.siedebar_script')
    </body>

</html>
