@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Designation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("designation.index") }}">Designation</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($designations->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no designation added yet.</h4>
            <a href="{{ route("designation.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Designation</a>

        </div>
    @else
        <div class="container">
            <a href="{{ route("designation.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Designation</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Designation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($designations as $designation)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $designation->name ?? "" }}</td>

                            <td>
                                <a href="{{ route("designation.edit", $designation->id) }}" class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-file-pen"></i> Edit</a>
                                <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#designationDeleteModal_{{ $designation->id }}"><i class="fa-solid fa-trash"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $designations->links("pagination::bootstrap-4") }}
        </div>
    @endif
    @include("backend.pages.designation.designation_delete_confirmation_modal")
@endsection
