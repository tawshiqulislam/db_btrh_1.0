@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Role</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("role.index") }}">Role</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($roles->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no role added yet.</h4>
            <a href="{{ route("role.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Role</a>

        </div>
    @else
        <div class="container table_create">
            <a href="{{ route("role.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Role</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $role->name ?? "" }}</td>

                            <td>
                                <a href="{{ route("role.edit", $role->id) }}" class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-file-pen"></i> Edit</a>
                                <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#roleDeleteModal_{{ $role->id }}"><i class="fa-solid fa-trash"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $roles->links("pagination::bootstrap-4") }}
        </div>
    @endif
    @include("backend.pages.role.role_delete_confirmation_modal")
@endsection
