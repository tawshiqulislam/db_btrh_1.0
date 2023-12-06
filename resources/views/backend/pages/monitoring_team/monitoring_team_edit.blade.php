@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Monitoring Team</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("monitoring_team.index") }}">Monitoring Team</a></li>
                <li class="breadcrumb-item active">Edit Monitoring Team</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">

        <form action="{{ route("monitoring_team.update", $monitoring_team->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="project_initiation_id">Project Initiation:</label>
                    <select name="project_initiation_id" id="project_initiation_id" class="form-control" required>
                        <option value="{{ $monitoring_team->project_initiation->id }}">{{ $monitoring_team->project_initiation->name }}</option>
                        @foreach ($project_initiations as $project_initiation)
                            <option value="{{ $project_initiation->id }}">{{ $project_initiation->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="user_id">User:</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="{{ $monitoring_team->user->id }}">{{ $monitoring_team->user->username }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
@endsection
