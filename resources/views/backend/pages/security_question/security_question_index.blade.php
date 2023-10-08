@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Security Question</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("security_question.index") }}">Security Question</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($security_questions->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no security question added yet.</h4>
            <a href="{{ route("security_question.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Security Question</a>

        </div>
    @else
        <div class="container">
            <a href="{{ route("security_question.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Security Question</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Questions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($security_questions as $security_question)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $security_question->name ?? "" }}</td>

                            <td>
                                <a href="{{ route("security_question.info", $security_question->id) }}"
                                    class="btn btn-info btn-sm text-white">
                                    <i class="fa-solid fa-circle-info"></i> Info</a>
                                <a href="{{ route("security_question.edit", $security_question->id) }}"
                                    class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-file-pen"></i> Edit</a>
                                <a href="{{ route("security_question.delete", $security_question->id) }}"
                                    class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $security_questions->links("pagination::bootstrap-4") }}
        </div>
    @endif

@endsection
