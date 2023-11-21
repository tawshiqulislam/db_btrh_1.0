@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Submission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_submission.index") }}">Project Submission</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main container -->
    <div class="container">
        <a href="{{ route("project_submission.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single project_initiation Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">

                        {{ $project_submission->project_initiation->name }}
                        @if ($project_submission->isAccepted == false)
                            <a onclick="return confirm('Are you sure?')" href="{{ route("project_submission.accepted", $project_submission->id) }}" class=" btn btn-warning text-white btn-sm float-end"><i
                                    class="fa-solid fa-eye"></i>
                                Accept Project</a>
                        @endif
                    </div>
                    <div class="card-body mt-2">
                        <p><strong>Project Description: </strong>{{ $project_submission->description ?? "" }}</p>
                        <p><strong>Comment: </strong>{{ $project_submission->comment ?? "" }}</p>
                        <p><strong>File: </strong><a target="_blank" href="{{ asset("storage/project_submission/" . $project_submission->file) }}">Project File</a></p>
                        <p><strong>Project URL: </strong>{{ $project_submission->link ?? "" }}</p>
                        <p><strong>Status: </strong>{{ $project_submission->status ?? "" }}</p>
                        <p><strong>Submitted By: </strong>{{ $project_submission->user->username ?? "" }}</p>
                        <p><strong>isAccepted: </strong>{{ $project_submission->isAccepted ? "Yes" : "NO" }}</p>
                        <p><strong>Accepted By: </strong>{{ $project_submission->project_accepted_by_user->username ?? "Note accepted yet!" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
