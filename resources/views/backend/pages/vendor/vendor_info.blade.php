@extends("backend.layouts.master")

@section("content")
    <div class="pagetitle">
        <h1>Vendor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("vendor.index") }}">Vendor</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">
        <a href="{{ route("vendor.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single vendor Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="row p-2">
                        <!--cheking profile picture is present or not-->
                        <div class="col-md-6">
                            @if ($vendor->pro_pic)
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <img style="width:200px" src="{{ asset("storage/vendor/" . $vendor->pro_pic) }}" class="card-img-top border border-1 p-2 rounded" alt="{{ $vendor->name }}">
                                    </div>

                                </div>
                            @else
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <img style="width:200px" src="{{ asset("image/no_profile_picture.png") }}" class="card-img-top border border-1 p-2 rounded" alt="{{ $vendor->name }}">
                                    </div>

                                </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="card-header float-end">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- @if ($vendor->isVerified)
                                            @if ($vendor->user_type == "vendor")
                                            @else
                                                <span class="dropdown">
                                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Role
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#userRoleAssignModal">Assign Role</a></li>
                                                        <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#userRoleDeleteModal">Remove Role</a></li>
                                                    </ul>
                                                </span>
                                            @endif
                                        @endif --}}
                                        <span class="dropdown">
                                            <button class="btn btn-info text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Profile Picture
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @if ($vendor->pro_pic)
                                                    <li> <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal">Update Picture</a></li>
                                                    <li> <a class="dropdown-item" href="{{ route("vendor.remove_profile_picture", $vendor->id) }}">Remove Picture</a></li>
                                                @else
                                                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal">Upload Picture</a></li>
                                                @endif
                                            </ul>
                                        </span>

                                        <span class="dropdown">
                                            <button class="btn btn-dark text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Vendor Verification
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @if ($vendor->isVerified)
                                                    <li> <a class="dropdown-item" onclick="return confirm('Do you want to unverified this vendor?')"
                                                            href="{{ route("vendor.unverified", $vendor->id) }}">Unverified
                                                            vendor</a>
                                                    </li>
                                                @else
                                                    <li> <a class="dropdown-item" onclick="return confirm('Do you want to verified this vendor?')"
                                                            href="{{ route("vendor.verified", $vendor->id) }}">Verified
                                                            vendor</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </span>
                                        {{-- @if ($vendor->pro_pic)
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal" class="btn btn-sm btn-warning text-white "><i
                                                    class="fa-solid fa-image"></i>
                                                Update
                                                Picture</button>
                                            <a href="{{ route("vendor.remove_profile_picture", $vendor->id) }}" class="btn btn-sm btn-danger text-white "><i class="fa-solid fa-minus"></i>
                                                Remove
                                                Picture</a>
                                        @else
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#profilePictureUpdateModal" class="btn btn-sm btn-info text-white "><i
                                                    class="fa-solid fa-image"></i>
                                                Upload
                                                Picture</button>
                                        @endif --}}

                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#documentModal"><i class="fa-solid fa-file"></i> Upload Documents</button>

                                        <a href="{{ route("vendor.edit", $vendor->id) }}" class=" btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-pen"></i>
                                            Edit Vendor</a>

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
                                        Comapny Name
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->company_name ?? "" }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Company Address
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->company_address ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Company Email
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->company_email_address ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Company Key Contact Person Name
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->company_key_contact_person_name ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Designation of Key Contact Person
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->designation_of_key_contact_person ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Key Contact Person Email Address
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->key_contact_person_email_address ?? "" }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Trade License No
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->trade_license_no ?? "" }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        VAT/BIN No
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->vat_bin_no ?? "" }}
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 1
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->sq_no_1 ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 1 answer
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->sq_no_1_ans ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 2
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->sq_no_2 ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Security question 2 answer
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->sq_no_2_ans ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        TIN No
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->tin_no ?? "" }}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Type
                                    </div>
                                    <div class="col-7">
                                        : {{ $vendor->user_type ?? "" }}
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="row">
                                    <div class="col-5">
                                        Roles
                                    </div>
                                    <div class="col-7">
                                        : @foreach ($vendor->roles as $role)
                                            <span class="badge bg-danger rounded-pill">{{ $role->name ?? "" }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        Documents:
                                    </div>

                                    <div class="col-12">

                                        @if (!$vendor->documents->count() == 0)
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Document</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($vendor->documents as $document)
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

    @include("backend.pages.vendor.vendor_profile_picture_upload_modal")
    @include("backend.pages.vendor.vendor_document_upload_modal")
    @include("backend.pages.vendor.vendor_document_edit_modal")
    @include("backend.pages.vendor.vendor_document_delete_confirmation_modal")
    @include("backend.pages.vendor.vendor_role_assign_modal")
    @include("backend.pages.vendor.vendor_role_delete_modal")
@endsection
