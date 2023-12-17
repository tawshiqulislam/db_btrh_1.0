@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("user.index") }}">User</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">
        <a href="{{ route("user.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single user Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="row p-2">
                        <!--cheking profile picture is present or not-->
                        <div class="col-md-6">
                            @if ($user->pro_pic)
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <img style="width:200px" src="{{ asset("storage/user/" . $user->pro_pic) }}" class="card-img-top border border-1 p-2 rounded" alt="{{ $user->name }}">
                                    </div>

                                </div>
                            @else
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <img style="width:200px" src="{{ asset("image/no_profile_picture.png") }}" class="card-img-top border border-1 p-2 rounded" alt="{{ $user->name }}">
                                    </div>

                                </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="card-header float-end">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($user->isVerified)
                                            @if ($user->user_type == "vendor")
                                            @else
                                                <span class="dropdown">
                                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Roles & Permissions
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#userRolePermissionAssignModal_{{ $user->id }}">Assign Role &
                                                                Permission</a></li>
                                                        <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#userRolePermissionDeleteModal_{{ $user->id }}">Remove Role &
                                                                Permission</a></li>
                                                    </ul>
                                                </span>
                                            @endif
                                        @endif
                                        {{-- permission --}}
                                        {{-- <span class="dropdown">

                                            <button class="btn btn-danger text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Permission
                                            </button>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                <li> <button class="btn btn-success btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#permissionModal_{{ $user->id }}">
                                                        Give Permission</button></li>
                                                <li> <button class="btn btn-success btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#remove_permissionModal_{{ $user->id }}">
                                                        Remove Permission</button></li>

                                            </ul>
                                        </span> --}}
                                        <span class="dropdown">
                                            <button class="btn btn-info text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Profile Picture
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @if ($user->pro_pic)
                                                    <li> <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal">Update Picture</a></li>
                                                    <li> <a class="dropdown-item" href="{{ route("user.remove_profile_picture", $user->id) }}">Remove Picture</a></li>
                                                @else
                                                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal">Upload Picture</a></li>
                                                @endif
                                            </ul>
                                        </span>

                                        <span class="dropdown">
                                            <button class="btn btn-dark text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                User Verification
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @if ($user->isVerified)
                                                    <li> <a class="dropdown-item" onclick="return confirm('Do you want to unverified this user?')"
                                                            href="{{ route("user.unverified", $user->id) }}">Unverified
                                                            User</a>
                                                    </li>
                                                @else
                                                    <li> <a class="dropdown-item" onclick="return confirm('Do you want to verified this user?')" href="{{ route("user.verified", $user->id) }}">Verified
                                                            User</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </span>
                                        {{-- @if ($user->pro_pic)
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal" class="btn btn-sm btn-warning text-white "><i
                                                    class="fa-solid fa-image"></i>
                                                Update
                                                Picture</button>
                                            <a href="{{ route("user.remove_profile_picture", $user->id) }}" class="btn btn-sm btn-danger text-white "><i class="fa-solid fa-minus"></i>
                                                Remove
                                                Picture</a>
                                        @else
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal" class="btn btn-sm btn-info text-white "><i
                                                    class="fa-solid fa-image"></i>
                                                Upload
                                                Picture</button>
                                        @endif --}}

                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#documentModal"><i class="fa-solid fa-file"></i> Upload Documents</button>

                                        <a href="{{ route("user.edit", $user->id) }}" class=" btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-pen"></i>
                                            Edit Profile</a>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row g-2">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Name
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->name ?? "" }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Username
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->username ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Email
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->email ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Phone number
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->phone_no ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Address
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->address ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        ID Number
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->id_number ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        ID type
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->id_type ?? "" }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        isVerified
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->isVerified == true ? "Verified" : "Unverified" }}
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 1
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->sq_no_1 ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 1 answer
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->sq_no_1_ans ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 2
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->sq_no_2 ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 2 answer
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->sq_no_2_ans ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Date of Birth
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->date_of_birth ?? "" }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        User Type
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->user_type ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Roles
                                    </div>
                                    <div class="col-7">
                                        @if (count($user->roles) > 0)
                                            : @foreach ($user->roles as $role)
                                                <span class="badge bg-danger rounded-pill">{{ $role->name ?? "" }}</span>
                                            @endforeach
                                        @else
                                            : <span>No roles assigned yet!</span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Permissions
                                    </div>
                                    <div class="col-7">
                                        @if (count($user->permissions) > 0)
                                            : @foreach ($user->permissions as $permission)
                                                <span class="badge bg-danger rounded-pill">{{ $permission->name ?? "" }}</span>
                                            @endforeach
                                        @else
                                            : <span>No permissions assigned yet!</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        Documents:
                                    </div>

                                    <div class="col-12">

                                        @if (!$user->documents->count() == 0)
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Document</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($user->documents as $document)
                                                        <tr>
                                                            <td><a target="_blank" href="{{ asset("storage/document/" . $document->document) }}">{{ $document->document ?? "" }}</a></td>
                                                            <td>
                                                                <a target="_blank" href="{{ asset("storage/document/" . $document->document) }}" class="btn btn-sm btn-primary text-white"><i
                                                                        class="fa-solid fa-eye"></i> View</a>
                                                                <a data-bs-toggle="modal" data-bs-target="#updateDocumentModal_{{ $document->id }}"
                                                                    class="btn btn-warning text-white btn-sm me-1 editBtn">
                                                                    <i class="fa-solid fa-file-pen"></i> Update
                                                                </a>

                                                                <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#documentDeleteModal_{{ $document->id }}"><i
                                                                        class="fa-solid fa-trash"></i>
                                                                    Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            There are no documents
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("backend.pages.user.user_profile_picture_upload_modal")
    @include("backend.pages.user.user_document_upload_modal")
    @include("backend.pages.user.user_document_edit_modal")
    @include("backend.pages.user.user_document_delete_confirmation_modal")
    @include("backend.pages.user.user_role_permission_assign_modal")
    @include("backend.pages.user.user_role_permission_delete_modal")
    {{-- @include("backend.pages.user.user_give_permission_modal")
    @include("backend.pages.user.user_remove_permission_modal") --}}

@endsection
