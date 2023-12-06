@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Initiation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_initiation.index") }}">Project Initiation</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!--  Search Bar -->
    <div class="input-group mb-3">
        <input type="search" id="search" class="form-control" placeholder="Search project initiation...">
        <button id="search-button" type="button" class="btn btn-primary">
            <i class="fa fa-search"></i>
        </button>
    </div>
    <!-- main container -->

    <!-- if there are no data in project initiations table -->
    @if ($project_initiations->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no project initiation added yet.</h4>
            @role(["super_admin", "admin"])
                <a href="{{ route("project_initiation.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                    Add Project Initiation</a>
            @endrole
        </div>

        <!-- if the data are present in project initiations table -->
    @else
        <div class="container table_create">
            <div class="top-button-group d-flex justify-content-between mb-3">
                <div class="add_project_initiation_btn">
                    @role(["super_admin", "admin"])
                        <a href="{{ route("project_initiation.create") }}" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-plus"></i>
                            Add Project Initiation</a>
                    @endrole
                </div>
                @role(["super_admin", "admin"])
                    <div class="verify_unverify_btn d-flex gap-3">
                        <button type="button" class="btn btn-success btn-sm position-relative">
                            Verified Project
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $total_verified_project_initiations }}
                            </span>
                        </button>
                        <button type="button" class="btn btn-dark btn-sm position-relative">
                            Unverified Project
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $total_unverified_project_initiations }}
                            </span>
                        </button>
                    </div>
                @endrole
            </div>
            <div class="table-data table-responsive">
                <table class="table table-sm table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">SL No</th>
                            <th scope="col">Category</th>
                            {{-- <th scope="col">Deadline</th> --}}
                            <th scope="col">isVerified</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project_initiations as $project_initiation)
                            <tr>
                                <td scope='row'>{{ ++$sl }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $project_initiation->name ?? "" }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $project_initiation->project_category->name ?? "" }}</td>
                                {{-- <td>{{ $project_initiation->deadline ?? "" }}</td> --}}
                                <td>{{ $project_initiation->isVerified == true ? "Yes" : "No" }}</td>
                                <td>{{ ucfirst($project_initiation->status) ?? "" }}</td>
                                <td>
                                    <a href="{{ route("project_initiation.info", $project_initiation->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-circle-info"></i> Info</a>
                                    @role(["super_admin", "admin"])
                                        <a href="{{ route("project_initiation.edit", $project_initiation->id) }}" class="btn btn-primary btn-sm text-white">
                                            <i class="fa-solid fa-file-pen"></i> Edit</a>
                                        <a type="button" class=" btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#project_initiationDeleteModal_{{ $project_initiation->id }}"><i
                                                class="fa-solid fa-trash"></i>
                                            Delete</a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination link -->
                {{ $project_initiations->links("pagination::bootstrap-4") }}
            </div>
        </div>
        @include("includes.ajax_search_script")
    @endif
    @include("backend.pages.project_initiation.project_initiation_delete_confirmation_modal")
@endsection
