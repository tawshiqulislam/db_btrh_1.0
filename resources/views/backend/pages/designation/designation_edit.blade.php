@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Designation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("designation.index") }}">Designation</a></li>
                <li class="breadcrumb-item active">Edit Designation</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">

        <form class="form_create" action="{{ route("designation.update", $designation->id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="designation">Designation:</label>
                <input value="{{ $designation->name }}" placeholder="Enter designation" type="text" class="form-control" id="designation" name="name" required>
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
