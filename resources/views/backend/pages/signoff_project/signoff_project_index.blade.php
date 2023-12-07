@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Sign-Off Project</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("signoff_project.index") }}">Sign-Off Project</a></li>
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
    @if ($signoff_projects->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no sign-off project.</h4>
        </div>

        <!-- if the data are present in my task table -->
    @else
        <div class="container table_create">
            <div class="table-data table-responsive">
                <table class="table table-sm table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Sl No.</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Sign-Off By</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($signoff_projects as $signoff_project)
                            {{-- @dd($disburse_project_payment->assigned_to_user) --}}
                            <tr>
                                <td scope='row'>{{ ++$sl }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $signoff_project->project_initiation->name ?? "" }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $signoff_project->signoff_by->username ?? "" }}</td>

                                <td>
                                    <a href="{{ route("signoff_project.info", $signoff_project->id) }}" class=" btn btn-info text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                        View Project</a>
                                    {{-- <a href="{{ route("disburse_project_payment.info", $disburse_project_payment->id) }}" class=" btn btn-warning text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                    Accept Project</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination link -->
                {{ $signoff_projects->links("pagination::bootstrap-4") }}
            </div>

        </div>
    @endif
@endsection
