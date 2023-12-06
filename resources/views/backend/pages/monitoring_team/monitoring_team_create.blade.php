@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Monitoring Team</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Monitoring Team</a></li>
                <li class="breadcrumb-item active">Make Monitoring Team</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->
    <div class="container">

        <form action="{{ route("monitoring_team.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-12">
                    <label for="project_initiation_id" id="project_initiation_id">Select Project:</label>
                    <select name="project_initiation_id" id="project_initiation_id" class="form-control" required>
                        <option selected disabled>Select Project</option>
                        @foreach ($project_initiations as $project_initiation)
                            <option value="{{ $project_initiation->id }}">{{ $project_initiation->name ?? "" }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="assigned_to">Select User:</label>
                    <div class="row g-2">
                        @foreach ($users as $user)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="user_ids[]" value="{{ $user->id }}" id="user_{{ $user->id }}">
                                    <label class="form-check-label" for="user_{{ $user->id }}">
                                        {{ $user->name }} ({{ $user->email }})
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
@endsection
