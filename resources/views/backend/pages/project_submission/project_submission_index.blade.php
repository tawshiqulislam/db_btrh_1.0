@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Submission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_submission.index") }}">Project Submission</a></li>
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
    @if ($project_submissions->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no project submitted yet.</h4>
        </div>

        <!-- if the data are present in my task table -->
    @else
        <div class="container table_create">
            <div class="projet_submission">
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#submitted_project">Submitted Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#approved_project">Approved Project</a>
                    </li>
                </ul>

                <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="submitted_project">
                        <div class="table-data table-responsive">
                            <table class="table table-sm table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No.</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">isApproved</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($submitted_projects as $submitted_project)
                                        {{-- @dd($project_submission->assigned_to_user) --}}
                                        <tr>
                                            <td scope='row'>{{ ++$sl }}</td>
                                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $submitted_project->project_initiation->name ?? "" }}</td>
                                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $submitted_project->status ?? "" }}</td>
                                            <td>{{ $submitted_project->isApproved ? "Yes" : "No" }}</td>

                                            <td>
                                                <a href="{{ route("project_submission.info", $submitted_project->id) }}" class=" btn btn-info text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                                    View Project</a>
                                                {{-- <a href="{{ route("project_submission.info", $project_submission->id) }}" class=" btn btn-warning text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                                    Accept Project</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- pagination link -->
                            {{ $submitted_projects->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="approved_project">
                        <div class="table-data table-responsive">
                            <table class="table table-sm table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No.</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">isApproved</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approved_projects as $approved_project)
                                        {{-- @dd($project_submission->assigned_to_user) --}}
                                        <tr>
                                            <td scope='row'>{{ ++$sl }}</td>
                                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $approved_project->project_initiation->name ?? "" }}</td>
                                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $approved_project->status ?? "" }}</td>
                                            <td>{{ $approved_project->isApproved ? "Yes" : "No" }}</td>

                                            <td>
                                                <a href="{{ route("project_submission.info", $approved_project->id) }}" class=" btn btn-info text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                                    View Project</a>
                                                {{-- <a href="{{ route("project_submission.info", $project_submission->id) }}" class=" btn btn-warning text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                                    Accept Project</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- pagination link -->
                            {{ $approved_projects->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
