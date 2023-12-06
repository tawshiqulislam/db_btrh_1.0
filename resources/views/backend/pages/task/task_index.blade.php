@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Task</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("task.index") }}">Task</a></li>
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
    @if ($tasks->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no task assigned yet.</h4>
            <a href="{{ route("task.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Assign Task</a>
        </div>

        <!-- if the data are present in project initiations table -->
    @else
        <div class="container table_create">
            <div class="top-button-group d-flex justify-content-between mb-3">
                <div class="add_project_initiation_btn">
                    <a href="{{ route("task.create") }}" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-plus"></i>
                        Assign Task</a>
                </div>
            </div>
            <div class="table-data table-responsive">
                <table class="table table-sm table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Sl No.</th>
                            <th scope="col">Task</th>
                            <th scope="col">Project</th>
                            <th scope="col">Assign To</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            {{-- @dd($task->assigned_to_user) --}}
                            <tr>
                                <td scope='row'>{{ ++$sl }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {!! $task->task ?? "" !!}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $task->project_initiation->name ?? "" }}</td>
                                <td>{{ $task->assigned_to_user->username ?? "" }}</td>
                                <td>{{ $task->deadline ?? "" }}</td>
                                <td>{{ ucfirst($task->status) ?? "" }}</td>
                                <td>
                                    <a href="{{ route("task.info", $task->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-circle-info"></i> Info</a>
                                    <a href="{{ route("task.edit", $task->id) }}" class="btn btn-primary btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit</a>
                                    <a type="button" class=" btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#taskDeleteModal_{{ $task->id }}"><i class="fa-solid fa-trash"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination link -->
                {{ $tasks->links("pagination::bootstrap-4") }}
            </div>
        </div>
        @include("includes.ajax_search_script")
    @endif
    @include("backend.pages.task.task_delete_confirmation_modal")
@endsection
