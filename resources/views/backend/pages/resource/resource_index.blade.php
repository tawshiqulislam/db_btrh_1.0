@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Resource</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("resource.index") }}">Resource</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div>
    {{-- <!--  Search Bar -->
    <div class="input-group mb-3">
        <input type="search" id="search" class="form-control" placeholder="Search Resource...">
        <button id="search-button" type="button" class="btn btn-primary">
            <i class="fa fa-search"></i>
        </button>
    </div> --}}
    <!-- main container -->

    <!-- if there are no data in Resources table -->
    @if ($resources->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no resource added yet.</h4>
            <a href="{{ route("resource.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Resource</a>
        </div>

        <!-- if the data are present in Resources table -->
    @else
        <div class="container">
            <div class="top-button-group d-flex justify-content-between mb-3">
                <div class="add_resource_btn">
                    <a href="{{ route("resource.create") }}" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-plus"></i>
                        Add Resource</a>
                </div>
            </div>
            <div class="table-data table-responsive">
                <table class="table table-sm table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Project</th>
                            <th scope="col">Resource Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resources as $resource)
                            <tr>
                                <td scope='row'>{{ ++$sl }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $resource->name ?? "" }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $resource->project_initiation->name ?? "" }}</td>
                                <td>{{ $resource->resource_type ?? "" }}</td>
                                <td>
                                    <a href="{{ route("resource.info", $resource->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-circle-info"></i> Info</a>
                                    <a href="{{ route("resource.edit", $resource->id) }}" class="btn btn-primary btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit</a>
                                    <a type="button" class=" btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#resourceDeleteModal_{{ $resource->id }}"><i class="fa-solid fa-trash"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination link -->
                {{ $resources->links("pagination::bootstrap-4") }}
            </div>
        </div>
        {{-- @include("includes.ajax_search_script") --}}
    @endif
    @include("backend.pages.resource.resource_delete_confirmation_modal")
@endsection
