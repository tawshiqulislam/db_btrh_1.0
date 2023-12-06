@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Monitoring Team</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("monitoring_team.index") }}">Monitoring Team</a></li>
                <li class="breadcrumb-item active">Make Monitoring Team</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->
    <div class="container">

        <form action="{{ route("monitoring_team.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="monitoring_team">monitoring_team:</label>
                <input type="text" placeholder="Enter monitoring_team" class="form-control" id="monitoring_team" name="name" required>
                @if ($errors->has("name"))
                    <p class="text-danger">{{ $errors->first("name") }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
@endsection
