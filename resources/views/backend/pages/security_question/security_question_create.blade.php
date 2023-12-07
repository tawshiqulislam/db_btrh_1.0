@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Security Question</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("security_question.index") }}">Sequrity Questions</a></li>
                <li class="breadcrumb-item active">Add Security Question</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->
    <div class="container">

        <form class="form_create" action="{{ route("security_question.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="security_question">Security Question:</label>
                <input type="text" placeholder="Enter security question" class="form-control" id="security_question"
                    name="name" required>
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
