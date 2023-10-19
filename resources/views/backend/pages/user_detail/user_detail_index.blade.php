@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>User Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("user_detail.index") }}">User Detail</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div>

    <!-- main container -->

    <!-- if there are no data in user detail table -->
    @if ($user_details->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no user detail added yet.</h4>
            <a href="{{ route("user_detail.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add User Detail</a>
        </div>

        <!-- if the data are present in user detail table -->
    @else
        <div class="container">
            <div class="top-button-group mb-3">
                <div class="add_user_detail_btn">
                    <a href="{{ route("user_detail.create") }}" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-plus"></i>
                        Add User Detail</a>
                </div>
            </div>
            <div class="table-data">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Username</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_details as $user_detail)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $user_detail->user->username ?? "" }}</td>

                                <td><a target="_blank" href="{{ asset("storage/user_detail/" . $user_detail->file) }}">{{ $user_detail->file }}</a>
                                </td>
                                <td>

                                    <a target="_blank" href="{{ asset("storage/user_detail/" . $user_detail->file) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-circle-info"></i> Info</a>
                                    <a href="{{ route("user_detail.edit", $user_detail->id) }}" class="btn btn-primary btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit</a>
                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#user_detailDeleteModal_{{ $user_detail->id }}"><i class="fa-solid fa-trash"></i>
                                        Delete</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination link -->
                {{ $user_details->links("pagination::bootstrap-4") }}
            </div>

        </div>
    @endif
    @include("backend.pages.user_detail.user_detail_delete_confirmation_modal")
@endsection
