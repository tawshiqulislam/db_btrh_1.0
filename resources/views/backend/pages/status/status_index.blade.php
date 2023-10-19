@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Status</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("status.index") }}">Status</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($statuss->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no status added yet.</h4>
            <a href="{{ route("status.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Status</a>

        </div>
    @else
        <div class="container">
            <a href="{{ route("status.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Status</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statuss as $status)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $status->status ?? "" }}</td>

                            <td>
                                <a href="{{ route("status.edit", $status->id) }}" class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-file-pen"></i> Edit</a>
                                <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#statusDeleteModal_{{ $status->id }}"><i class="fa-solid fa-trash"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $statuss->links("pagination::bootstrap-4") }}
        </div>
    @endif
    @include("backend.pages.status.status_delete_confirmation_modal")
@endsection
