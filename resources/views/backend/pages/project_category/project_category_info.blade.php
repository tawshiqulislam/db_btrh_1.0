@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_category.index") }}">Project Category</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- back to index page -->
    <div class="container">
        <a href="{{ route("project_category.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                class="fa-solid fa-backward"></i>
            Back</a>
        <!-- main container -->
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between ">
                        <h5 class="card-text">{{ $project_category->name ?? "" }}</h5>
                        <a href="{{ route("project_category.edit", $project_category->id) }}"
                            class="btn btn-primary btn-sm text-white">
                            <i class="fa-solid fa-file-pen"></i> Edit</a>
                    </div>
                    <div class="card-body">
                        @if ($project_category->description)
                            <p class="card-text">{{ $project_category->description ?? "" }}</p>
                        @else
                            <p>There is no description</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
