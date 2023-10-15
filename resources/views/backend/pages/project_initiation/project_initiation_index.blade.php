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
            <a href="{{ route("project_initiation.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Project Initiation</a>
        </div>

        <!-- if the data are present in project initiations table -->
    @else
        <div class="container">
            <div class="top-button-group d-flex justify-content-between mb-3">
                <div class="add_project_initiation_btn">
                    <a href="{{ route("project_initiation.create") }}" class="btn btn-primary btn-sm text-white"><i
                            class="fa-solid fa-plus"></i>
                        Add Project Initiation</a>
                </div>
                <div class="verify_unverify_btn">
                    <a href="" class="btn btn-success btn-sm text-white">Verified Project
                        ({{ $verified_project_initiations->count() }})</a>
                    <a href="" class="btn btn-dark btn-sm text-white">Unverified Project
                        ({{ $unverified_project_initiations->count() }})</a>
                </div>
            </div>
            <div class="table-data">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Deadline</th>
                            <th>Verified By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project_initiations as $project_initiation)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td
                                    style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $project_initiation->name ?? "" }}</td>
                                <td
                                    style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $project_initiation->project_category->name ?? "" }}</td>
                                <td>{{ $project_initiation->deadline ?? "" }}</td>
                                <td>{{ $project_initiation->verified_by ?? "Not Verified" }}</td>
                                <td>
                                    <a href="{{ route("project_initiation.info", $project_initiation->id) }}"
                                        class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-circle-info"></i> Info</a>
                                    <a href="{{ route("project_initiation.edit", $project_initiation->id) }}"
                                        class="btn btn-primary btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit</a>
                                    <a href="{{ route("project_initiation.delete", $project_initiation->id) }}"
                                        class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-trash"></i>
                                        Delete</a>

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
@endsection
