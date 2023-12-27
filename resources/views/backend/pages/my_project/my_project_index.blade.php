@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>My Project</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("my_project.index") }}">My Project</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div>
    {{-- <!--  Search Bar -->
    <div class="input-group mb-3">
        <input type="search" id="search" class="form-control" placeholder="Search project initiation...">
        <button id="search-button" type="button" class="btn btn-primary">
            <i class="fa fa-search"></i>
        </button>
    </div> --}}
    <!-- main container -->

    <!-- if there are no data in project initiations table -->
    @if ($my_projects->count() == 0)
        <div class="container mt-5 text-center">
            <h4>You are not assigned to any project yet.</h4>
        </div>

        <!-- if the data are present in project initiations table -->
    @else
        <div class="container table_create">
            <div class="table-data table-responsive">
                <table class="table table-sm table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($my_projects as $my_project)
                            <tr>
                                <td scope='row'>{{ ++$sl }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $my_project->project_initiation->name ?? "" }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $my_project->project_initiation->project_category->name ?? "" }}</td>
                                <td>
                                    <a href="{{ route("my_project.info", $my_project->project_initiation->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-circle-info"></i> Info</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination link -->
                {{ $my_projects->links("pagination::bootstrap-4") }}
            </div>
        </div>
        {{-- @include("includes.ajax_search_script") --}}
    @endif

@endsection
