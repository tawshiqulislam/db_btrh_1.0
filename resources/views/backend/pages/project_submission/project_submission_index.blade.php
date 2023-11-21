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
        <div class="container">
            <div class="table-data table-responsive">
                <table class="table table-sm table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Sl No.</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">isAccepted</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project_submissions as $project_submission)
                            {{-- @dd($project_submission->assigned_to_user) --}}
                            <tr>
                                <td scope='row'>{{ ++$sl }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $project_submission->project_initiation->name ?? "" }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $project_submission->status ?? "" }}</td>
                                <td>{{ $project_submission->isAccepted ? "Yes" : "No" }}</td>

                                <td>
                                    <a href="{{ route("project_submission.info", $project_submission->id) }}" class=" btn btn-info text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                        View Task</a>
                                    {{-- <a href="{{ route("project_submission.info", $project_submission->id) }}" class=" btn btn-warning text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                        Accept Project</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination link -->
                {{ $project_submissions->links("pagination::bootstrap-4") }}
            </div>
        </div>
    @endif
@endsection
