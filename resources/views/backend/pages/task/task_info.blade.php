@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Initiation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("task.index") }}">Project Initiation</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main container -->
    <div class="container">
        <a href="{{ route("task.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single project_initiation Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">Task</div>
                    <div class="card-body mt-2">
                        <p><strong>Task: </strong>{!! $task->task ?? "" !!}</p>
                        <p><strong>Project: </strong>{{ $task->project_initiation->name ?? "" }}</p>
                        <p><strong>Assign To: </strong>{{ $task->assigned_to_user->username ?? "" }}</p>
                        <p><strong>Assign By: </strong>{{ $task->assigned_by_user->username ?? "" }}</p>
                        <p><strong>Deadline: </strong>{{ $task->deadline ?? "" }}</p>
                        <p><strong>Status: </strong>{{ ucfirst($task->status) ?? "" }}</p>
                        @if ($task->document)
                            <p><strong>Document: </strong><a target="_blank" href="{{ asset("storage/task/" . $task->document) }}">Task Document</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
