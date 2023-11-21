@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>My Task</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("my_task.index") }}">My Task</a></li>
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
    @if ($my_tasks->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no task assigned yet.</h4>
        </div>

        <!-- if the data are present in my task table -->
    @else
        <div class="container">
            <div class="table-data table-responsive">
                <table class="table table-sm table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Sl No.</th>
                            <th scope="col">My Task</th>
                            <th scope="col">Project</th>
                            <th scope="col">Assign To</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($my_tasks as $my_task)
                            {{-- @dd($my_task->assigned_to_user) --}}
                            <tr>
                                <td scope='row'>{{ ++$sl }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {!! $my_task->task ?? "" !!}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $my_task->project_initiation->name ?? "" }}</td>
                                <td>{{ $my_task->assigned_to_user->username ?? "" }}</td>
                                <td>{{ $my_task->deadline ?? "" }}</td>
                                <td>{{ ucfirst($my_task->status) ?? "" }}</td>
                                <td>
                                    <a href="{{ route("my_task.info", $my_task->id) }}" class=" btn btn-info text-white btn-sm"><i class="fa-solid fa-eye"></i>
                                        View Task</a>
                                    <a type="button" class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#myTaskChangeStatusModal"><i class="fa-solid fa-circle-check"></i>
                                        Change Status</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination link -->
                {{ $my_tasks->links("pagination::bootstrap-4") }}
            </div>
        </div>
    @endif
@endsection
@include("backend.pages.my_task.my_task_change_status_modal")
