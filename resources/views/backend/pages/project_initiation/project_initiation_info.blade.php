@extends("backend.layouts.master")
@section("content")

    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Initiation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_initiation.index") }}">Project Initiation</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main container -->
    <div class="container">
        <a href="{{ route("project_initiation.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single project_initiation Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-12">
                            <div class="card-header">

                                <h5>{{ $project_initiation->name ?? "" }}</h5>

                                <div class="button-group d-flex justify-content-end  gap-2 ">
                                    <a href="{{ route("project_initiation.edit", $project_initiation->id) }}" class=" btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-pen"></i>
                                        Edit</a>
                                    <!--verify and unverify button-->

                                    @if ($project_initiation->isVerified == false)
                                        @can("super_admin_admin")
                                            <a href="{{ route("project_initiation.verify", $project_initiation->id) }}" class="btn btn-info btn-sm text-white"><i class="fa-solid fa-certificate"></i>
                                                Verify</a>
                                        @endcan
                                    @else
                                        @can("super_admin_admin")
                                            <a href="{{ route("project_initiation.unverify", $project_initiation->id) }}" class="btn btn-dark btn-sm text-white"><i class="fa-solid fa-certificate"></i>
                                                Univerify</a>
                                        @endcan
                                    @endif
                                    {{-- project active inactive --}}
                                    @if ($project_initiation->status == "inactive" && $project_initiation->isVerified == false)
                                        @can("super_admin_admin")
                                            <a href="{{ route("project_initiation.active", $project_initiation->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-circle-check"></i>
                                                Active This Project </a>
                                        @endcan
                                    @endif

                                    @if ($project_initiation->status == "inactive" && $project_initiation->isVerified == true)
                                        @can("super_admin_admin")
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#project_initiation_active_Modal" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-circle-check"></i>
                                                Active This Project </a>
                                        @endcan
                                    @endif

                                    @if ($project_initiation->status == "active")
                                        @can("super_admin_admin")
                                            <a href="{{ route("project_initiation.inactivate", $project_initiation->id) }}" class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-circle-check"></i>
                                                Inactive This Project </a>
                                        @endcan
                                    @endif

                                    <button class="btn btn-success text-white btn-sm" data-bs-toggle="modal" data-bs-target="#projectDocumentModal"><i class="fa-solid fa-file"></i> Upload Documents</button>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row g-2">

                            <div class="col-md-12">
                                <p class="card-text"><strong>Project Category:</strong>
                                    {{ $project_initiation->project_category->name ?? "" }}</p>
                            </div>

                            <div class="col-md-12">
                                <p class="card-text"><strong>Description:</strong></p>
                                <p class="card-text">{!! $project_initiation->description ?? "" !!}</p>
                            </div>
                            <div class="col-md-12">
                                <p class="card-text"><strong>Goal:</strong></p>
                                <p>{!! $project_initiation->goal ?? "" !!}</p>
                            </div>
                            <div class="col-md-12">
                                <p class="card-text"><strong>Deadline:</strong> {{ $project_initiation->deadline ?? "" }}
                                </p>
                            </div>

                            @if ($project_initiation->required_file)
                                <div class="col-md-12">
                                    <p class="card-text"><strong>Required File:</strong> <a target="_blank" href="{{ asset("storage/project_initiation/" . $project_initiation->required_file) }}">{{ $project_initiation->required_file }}</a>
                                    </p>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <p class="card-text"><strong>Project Initiated By:</strong> {{ $project_initiation->user->username }}
                                </p>

                            </div>
                            <div class="col-md-12">
                                <p class="card-text"><strong>isVerified:</strong> {{ $project_initiation->isVerified == true ? "Yes" : "No" }}
                                </p>
                            </div>

                            @if ($project_initiation->verified_by)
                                <div class="col-md-12">
                                    <p class="card-text"><strong>Verified By:</strong> {{ $project_initiation->verified_by_user->username ?? "Not verified yet" }}
                                    </p>
                                </div>
                            @endif
                            @if ($project_initiation->unverified_by)
                                <div class="col-md-12">
                                    <p class="card-text"><strong>Unverified By:</strong> {{ $project_initiation->unverified_by_user->username ?? "Not verified yet" }}
                                    </p>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <p class="card-text"><strong>Status:</strong> {{ ucfirst($project_initiation->status) ?? "" }}
                                </p>
                            </div>
                            @if ($project_initiation->activated_by)
                                <div class="col-md-12">
                                    <p class="card-text"><strong>Activated By:</strong> {{ $project_initiation->activated_by_user->username ?? "Not activated yet" }}
                                    </p>
                                </div>
                            @endif

                            @if ($project_initiation->inactivated_by)
                                <div class="col-md-12">
                                    <p class="card-text"><strong>Inactivated By:</strong> {{ $project_initiation->inactivated_by_user->username ?? "Project is active" }}
                                    </p>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <p class="card-text"><strong>Assignd To:</strong> {{ $project_initiation->assigned_to_user->username ?? "Not assigned yet" }}
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p class="card-text"><strong>Assignd By:</strong> {{ $project_initiation->assigned_by_user->username ?? "Not assigned yet" }}
                                </p>
                            </div>

                            <!--project documents-->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <strong> Project Documents:</strong>
                                    </div>

                                    <div class="col-12">
                                        @if (!$project_initiation->project_documents->count() == 0)
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> Document Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($project_initiation->project_documents as $project_document)
                                                        <tr>
                                                            <td><a target="_blank" href="{{ asset("storage/document/" . $project_document->document) }}">{{ $project_document->document ?? "" }}</a></td>
                                                            <td>
                                                                <a target="_blank" href="{{ asset("storage/document/" . $project_document->document) }}" class="btn btn-sm btn-primary text-white"><i class="fa-solid fa-eye"></i> View</a>
                                                                <a data-bs-toggle="modal" data-bs-target="#updateProjectDocumentModal_{{ $project_document->id }}" class="btn btn-warning text-white btn-sm me-1 editBtn">
                                                                    <i class="fa-solid fa-file-pen"></i> Update
                                                                </a>

                                                                <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#project_documentDeleteModal_{{ $project_document->id }}"><i class="fa-solid fa-trash"></i>
                                                                    Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            There are no project documents
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
    @include("backend.pages.project_initiation.project_document_upload_modal")
    @include("backend.pages.project_initiation.project_document_edit_modal")
    @include("backend.pages.project_initiation.project_document_delete_confirmation_modal")
    @include("backend.pages.project_initiation.project_initiation_active_modal")
@endsection
