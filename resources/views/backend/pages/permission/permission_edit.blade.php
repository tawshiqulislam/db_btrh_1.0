@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Permission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("permission.index") }}">Permission</a></li>
                <li class="breadcrumb-item active">Edit Permission</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">

        <form class="form_create" action="{{ route("permission.update", $permission->id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="permission">Permission:</label>
                <input value="{{ $permission->name }}" placeholder="Enter permission" type="text" class="form-control" id="permission" name="name" required>
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
