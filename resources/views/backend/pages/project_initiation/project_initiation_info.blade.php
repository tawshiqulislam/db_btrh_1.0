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
                            <div class="card-header d-flex justify-content-between">

                                <h5>{{ $project_initiation->name ?? "" }}</h5>

                                <div class="button-group">
                                    <a href="{{ route("project_initiation.edit", $project_initiation->id) }}" class=" btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-pen"></i>
                                        Edit</a>
                                    <!--verify and unverify button-->

                                    @if ($project_initiation->verified_by == null)
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
    @include("includes.upload_project_document_modal")
    @include("includes.edit_project_document_modal")
    @include("includes.project_document_delete_confirmation")
@endsection
