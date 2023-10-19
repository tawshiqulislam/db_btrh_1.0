@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Status</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("status.index") }}">Status</a></li>
                <li class="breadcrumb-item active">Add Status</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->
    <div class="container">

        <form action="{{ route("status.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="status">Status:</label>
                <input type="text" placeholder="Enter status" class="form-control" id="status" name="status" required>
                @if ($errors->has("status"))
                    <p class="text-danger">{{ $errors->first("status") }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
@endsection
