@extends("backend.layouts.master")
@section("content")

    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("user.index") }}">User</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($users->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no user added yet.</h4>
            <a href="{{ route("user.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add User</a>
        </div>
    @else
        <div class="container">
            <a href="{{ route("user.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add User</a>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>isVerfied</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $user->name ?? "" }}</td>
                                <td>{{ $user->username ?? "" }}</td>
                                <td>{{ $user->isVerified == 1 ? "Verified" : "Unverified" }}</td>
                                <td>
                                    @if ($user->roles->count() > 0)
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-info rounded-pill">{{ $role->name ?? "Role not assignd" }}</span>
                                        @endforeach
                                    @else
                                        {{ "Role not assigned" }}
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route("user.info", $user->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-circle-info"></i> Info</a>
                                    <a href="{{ route("user.edit", $user->id) }}" class="btn btn-primary btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit</a>
                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#userDeleteModal_{{ $user->id }}"><i class="fa-solid fa-trash"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links("pagination::bootstrap-4") }}
        </div>
    @endif
    @include("backend.pages.user.user_delete_confirmation_modal")
@endsection
