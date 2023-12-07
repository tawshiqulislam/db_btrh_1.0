@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_category.index") }}">Project Category</a></li>
                <li class="breadcrumb-item active">Add Project Category</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- End Page Title -->
    <!-- main container -->
    <div class="container">
        <form class="form_create" action="{{ route("project_category.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <!-- project category name -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="project_category">Project Category Name:</label>
                        <input type="text" placeholder="Enter project category name" class="form-control"
                            id="project_category" name="name" required>
                        <!-- validation error handling -->
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>
                <!-- project category description -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Project Category Description:</label>
                        <textarea class="form-control" placeholder='Enter project category description' name="description" id="description"
                            cols="30" rows="10"></textarea>
                        <!-- validation error handling -->
                        @if ($errors->has("description"))
                            <p class="text-danger">{{ $errors->first("description") }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- submit button -->
            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
@endsection
