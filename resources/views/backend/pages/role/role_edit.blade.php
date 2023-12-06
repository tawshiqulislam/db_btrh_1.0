@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Role</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("role.index") }}">Role</a></li>
                <li class="breadcrumb-item active">Edit Role</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">

        <form class="form_create" action="{{ route("role.update", $role->id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="role">Role:</label>
                <input value="{{ $role->name }}" placeholder="Enter role" type="text" class="form-control" id="role" name="name" required>
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
