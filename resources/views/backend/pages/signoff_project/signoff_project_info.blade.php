@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Sign-Off Project</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("signoff_project.index") }}">Sign-Off Project</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main container -->
    <div class="container">
        <a href="{{ route("signoff_project.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single project_initiation Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        {{ $signoff_project->project_initiation->name }}
                    </div>
                    <div class="card-body mt-2">
                        <p><strong>Description: </strong>{{ $signoff_project->description ?? "" }}</p>
                        <p><strong>File: </strong><a href="{{ asset("storage/signoff_project/" . $signoff_project->file) }}">Project File</a></p>

                        <p><strong>Status: </strong>{{ $signoff_project->status ?? "" }}</p>
                        <p><strong>Sign-Off By: </strong>{{ $signoff_project->signoff_by->username ?? "" }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
