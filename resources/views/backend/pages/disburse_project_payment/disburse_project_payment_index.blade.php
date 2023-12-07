@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Disburse Project Payment</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("disburse_project_payment.index") }}">Disburse Project Payment</a></li>
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
    @if ($disburse_project_payments->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no project submitted yet.</h4>
        </div>

        <!-- if the data are present in my task table -->
    @else
        <div class="container table_create">
            <div class="projet_submission">
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#pending_project">Pending Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#disbursed_project">Disbursed Project</a>
                    </li>
                </ul>

                <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="pending_project">
                        <div class="table-data table-responsive">
                            <table class="table table-sm table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No.</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending_projects as $pending_project)
                                        {{-- @dd($disburse_project_payment->assigned_to_user) --}}
                                        <tr>
                                            <td scope='row'>{{ ++$sl }}</td>
                                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $pending_project->project_initiation->name ?? "" }}</td>
                                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $pending_project->payment_status ?? "" }}</td>

                                            <td>
                                                <a href="{{ route("disburse_project_payment.info", $pending_project->id) }}" class=" btn btn-info text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                                    View Project</a>
                                                {{-- <a href="{{ route("disburse_project_payment.info", $disburse_project_payment->id) }}" class=" btn btn-warning text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                                    Accept Project</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- pagination link -->
                            {{ $pending_projects->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="disbursed_project">
                        <div class="table-data table-responsive">
                            <table class="table table-sm table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No.</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disbursed_projects as $disbursed_project)
                                        {{-- @dd($disburse_project_payment->assigned_to_user) --}}
                                        <tr>
                                            <td scope='row'>{{ ++$sl }}</td>
                                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $disbursed_project->project_initiation->name ?? "" }}</td>
                                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $disbursed_project->payment_status ?? "" }}</td>

                                            <td>
                                                <a href="{{ route("disburse_project_payment.info", $disbursed_project->id) }}" class=" btn btn-info text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                                    View Project</a>
                                                {{-- <a href="{{ route("disburse_project_payment.info", $disburse_project_payment->id) }}" class=" btn btn-warning text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                                Accept Project</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- pagination link -->
                            {{ $disbursed_projects->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
