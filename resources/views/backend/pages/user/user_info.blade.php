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
                                        @if ($user->pro_pic)
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal" class="btn btn-sm btn-warning text-white "><i class="fa-solid fa-image"></i>
                                                Update
                                                Picture</button>
                                            <a href="{{ route("user.remove_profile_picture", $user->id) }}" class="btn btn-sm btn-danger text-white "><i class="fa-solid fa-minus"></i>
                                                Remove
                                                Picture</a>
                                        @else
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal" class="btn btn-sm btn-info text-white "><i class="fa-solid fa-image"></i>
                                                Upload
                                                Picture</button>
                                        @endif

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
                                        Security question 1
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->sq_no_1 ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 1 answer
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->sq_no_1_ans ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 2
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->sq_no_2 ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 2 answer
                                    </div>
                                    <div class="col-7">
                                        : {{ $user->sq_no_2_ans ?? "" }}
                                    </div>
                                </div>
                            </div>

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
                                                                <a target="_blank" href="{{ asset("storage/document/" . $document->document) }}" class="btn btn-sm btn-primary text-white"><i class="fa-solid fa-eye"></i> View</a>
                                                                <a data-bs-toggle="modal" data-bs-target="#updateDocumentModal_{{ $document->id }}" class="btn btn-warning text-white btn-sm me-1 editBtn">
                                                                    <i class="fa-solid fa-file-pen"></i> Update
                                                                </a>
                                                                @include("includes.edit_document_modal")
                                                                <a href="{{ route("document.delete", $document->id) }}" class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-trash"></i>
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

    @include("includes.profile_picture_modal")
    @include("includes.upload_document_modal")

@endsection
