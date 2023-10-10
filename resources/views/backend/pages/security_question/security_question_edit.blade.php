@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Security Question</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("security_question.index") }}">Security Question</a></li>
                <li class="breadcrumb-item active">Edit Security Question</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">

        <form action="{{ route("security_question.update", $security_question->id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="security_question">Security Question:</label>
                <input value="{{ $security_question->name }}" placeholder="Enter security question" type="text"
                    class="form-control" id="security_question" name="name" required>
                @if ($errors->has("security_question"))
                    <p class="text-danger">{{ $errors->first("security_question") }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
@endsection
