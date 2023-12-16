@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Permission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("permission.index") }}">Permission</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($permissions->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no permission added yet.</h4>
            <a href="{{ route("permission.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Permission</a>

        </div>
    @else
        <div class="container table_create">
            <a href="{{ route("permission.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Permission</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Permission</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $permission->name ?? "" }}</td>

                            <td>
                                <a href="{{ route("permission.edit", $permission->id) }}" class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-file-pen"></i> Edit</a>
                                <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#permissionDeleteModal_{{ $permission->id }}"><i class="fa-solid fa-trash"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $permissions->links("pagination::bootstrap-4") }}
        </div>
    @endif
    @include("backend.pages.permission.permission_delete_confirmation_modal")
@endsection
