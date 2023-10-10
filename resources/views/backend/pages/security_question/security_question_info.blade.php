@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Security Question</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("security_question.index") }}">Security Question</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">
        <a href="{{ route("security_question.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single security_question Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-text">{{ $security_question->name ?? "" }}</h5>
                        <a href="{{ route("security_question.edit", $security_question->id) }}"
                            class="btn btn-primary btn-sm text-white">
                            <i class="fa-solid fa-file-pen"></i> Edit</a>
                    </div>
                    <div class="card-body">
                        <p>There is no description</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
