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
                                <div class="button-group d-flex justify-content-end  gap-2 mb-2">
                                    <a class="btn btn-sm btn-warning text-white" type="button" data-bs-toggle="modal" data-bs-target="#project_initiation_task_list_ModalToggle"><i
                                            class="fa-solid fa-eye"></i>
                                        Task List</a>

                                    <a href="{{ route("project_initiation.edit", $project_initiation->id) }}" class=" btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-pen"></i>
                                        Edit</a>

                                    <!--verify and unverify button-->
                                    @role("super_admin")
                                        <span class="dropdown">
                                            <button class="btn btn-dark text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-certificate"></i> Project
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                @if (!$project_initiation->isVerified)
                                                    <li> <a class="dropdown-item" onclick="return confirm('Do you want to verify this project?')"
                                                            href="{{ route("project_initiation.verify", $project_initiation->id) }}">
                                                            Verify</a></li>
                                                @endif

                                                @if ($project_initiation->isVerified)
                                                    <li> <a class="dropdown-item" onclick=" return confirm('Do you want to unverify this project?')"
                                                            href="{{ route("project_initiation.unverify", $project_initiation->id) }}">
                                                            Univerify</a></li>
                                                @endif
                                                <li> <a class="dropdown-item" onclick=" return confirm('Do you want to unverify this project?')"
                                                        href="{{ route("project_initiation.unverify", $project_initiation->id) }}">
                                                        Univerify</a></li>
                                                <li> <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#projectSubmissionModal">
                                                        Project Submission</a></li>

                                            </ul>
                                        </span>
                                    @endrole
                                    {{-- @if ($project_initiation->isVerified == false)
                                        @role("super_admin")
                                            <a onclick="confirm('Do you want to verify this project?')" href="{{ route("project_initiation.verify", $project_initiation->id) }}"
                                                class="btn btn-info btn-sm text-white"><i class="fa-solid fa-certificate"></i>
                                                Verify</a>
                                        @endrole
                                    @else
                                        @role("super_admin")
                                            <a onclick="confirm('Do you want to unverify this project?')" href="{{ route("project_initiation.unverify", $project_initiation->id) }}"
                                                class="btn btn-dark btn-sm text-white"><i class="fa-solid fa-certificate"></i>
                                                Univerify</a>
                                        @endrole
                                    @endif --}}
                                    {{-- project status --}}
                                    @if ($project_initiation->isVerified)
                                        @role("super_admin")
                                            <span class="dropdown">
                                                <button class="btn btn-success text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-circle-check"></i> Project Status
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                                                    @if ($project_initiation->status == "inactive")
                                                        <li> <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#project_initiation_active_Modal">
                                                                Active</a>
                                                        </li>
                                                    @endif
                                                    @if ($project_initiation->status == "active")
                                                        <li>
                                                            <a class="dropdown-item" onclick="return confirm('Do you want to inactive this project?')"
                                                                href="{{ route("project_initiation.inactivate", $project_initiation->id) }}">
                                                                Inactive</a>

                                                        </li>
                                                    @endif
                                                </ul>
                                            </span>
                                        @endrole
                                    @endif

                                    {{-- @if ($project_initiation->status == "inactive" && $project_initiation->isVerified == false)
                                        @role("super_admin")
                                            <a onclick="confirm('Do you want to active this project?')" href="{{ route("project_initiation.active", $project_initiation->id) }}"
                                                class="btn btn-success btn-sm text-white"><i class="fa-solid fa-circle-check"></i>
                                                Active This Project </a>
                                        @endrole
                                    @endif
                                    @if ($project_initiation->status == "inactive" && $project_initiation->isVerified == true)
                                        @role("super_admin")
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#project_initiation_active_Modal" class="btn btn-success btn-sm text-white"><i
                                                    class="fa-solid fa-circle-check"></i>
                                                Activate This Project </a>
                                        @endrole
                                    @endif

                                    @if ($project_initiation->status == "active")
                                        @role("super_admin")
                                            <a onclick="confirm('Do you want to inactive this project?')" href="{{ route("project_initiation.inactivate", $project_initiation->id) }}"
                                                class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-circle-check"></i>
                                                Inactive This Project </a>
                                        @endrole
                                    @endif --}}
                                    @if ($project_initiation->status == "active")
                                        <button class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#project_initiation_time_Modal"><i class="fa-solid fa-clock"></i> Set Project
                                            Time</button>
                                    @endif
                                    @if ($project_initiation->time_duration)
                                        <button class="btn btn-danger text-white btn-sm" data-bs-toggle="modal" data-bs-target="#project_initiation_key_deliverable_Modal"><i
                                                class="fa-solid fa-box-tissue"></i>
                                            Key Deliverable</button>
                                    @endif
                                    <button class="btn btn-secondary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#projectDocumentModal"><i class="fa-solid fa-file"></i> Upload
                                        Documents</button>
                                </div>
                                <h5>{{ $project_initiation->name ?? "" }}</h5>

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
                                <p class="card-text"><strong>Starting Date:</strong> {{ $project_initiation->time_duration->starting_date ?? "" }}
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p class="card-text"><strong>Ending Date:</strong> {{ $project_initiation->time_duration->ending_date ?? "" }}
                                </p>
                            </div>
                            @if ($project_initiation->required_file)
                                <div class="col-md-12">
                                    <p class="card-text"><strong>Required File:</strong> <a target="_blank"
                                            href="{{ asset("storage/project_initiation/" . $project_initiation->required_file) }}">{{ $project_initiation->required_file }}</a>
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
                                <p class="card-text"><strong>Assigned To: </strong>
                                    @if (!$project_initiation->activated_by)
                                        <span>Project not activated</span>
                                    @else
                                        <a type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#project_initiation_assign_member_Modal">Assign member</a>
                                    @endif

                                </p>
                                @if (App\Models\ProjectInitiationOverview::where("project_initiation_id", $project_initiation->id)->count() > 0)
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL No.</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($project_initiation_overviews as $key => $project_initiation_overview)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $project_initiation_overview->user->name }}</td>
                                                    <td>{{ $project_initiation_overview->user->username }}</td>
                                                    <td>{{ $project_initiation_overview->user->email }}</td>
                                                    <td>
                                                        @if ($project_initiation_overview->designation)
                                                            {{ $project_initiation_overview->designation }}
                                                        @else
                                                            <a class="text-primary" type="button" data-bs-toggle="modal"
                                                                data-bs-target="#project_initiation_user_designation_Modal_{{ $project_initiation_overview->id }}">Add
                                                                Designation</a>
                                                    </td>
                                            @endif

                                            <td>
                                                <a target="_blank" href="{{ route("user.info", $project_initiation_overview->user->id) }}" class=" btn btn-info text-white btn-sm"><i
                                                        class="fa-solid fa-eye"></i>
                                                    View User</a>
                                                <a href="{{ route("delete_assigned_user.delete", $project_initiation_overview->id) }}" onclick="return confirm('Are you sure?')"
                                                    class=" btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                                    Remove</a>
                                                @php
                                                    $task = App\Models\Task::where("project_initiation_id", $project_initiation_overview->project_initiation->id)
                                                        ->where("assigned_to", $project_initiation_overview->user->id)
                                                        ->first();
                                                @endphp
                                                @if ($project_initiation_overview->user->assigned_to_tasks->count() > 0 && $project_initiation_overview->project_initiation->tasks->count() > 0)
                                                    <a href="{{ route("task.info", $task->id) }}" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-eye"></i>
                                                        View Task</a>
                                                @else
                                                    <a class="text-white btn btn-sm btn-warning" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#project_initiation_user_assign_task_Modal_{{ $project_initiation_overview->id }}"><i class="fa-solid fa-thumbtack"></i> Assign
                                                        Task</a>
                                                @endif

                                            </td>
                                            </tr>
                                @endforeach
                                </tbody>
                                </table>
                                @endif

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
                                                            <td><a target="_blank" href="{{ asset("storage/document/" . $project_document->document) }}">{{ $project_document->document ?? "" }}</a>
                                                            </td>
                                                            <td>
                                                                <a target="_blank" href="{{ asset("storage/document/" . $project_document->document) }}" class="btn btn-sm btn-primary text-white"><i
                                                                        class="fa-solid fa-eye"></i> View</a>
                                                                <a data-bs-toggle="modal" data-bs-target="#updateProjectDocumentModal_{{ $project_document->id }}"
                                                                    class="btn btn-warning text-white btn-sm me-1 editBtn">
                                                                    <i class="fa-solid fa-file-pen"></i> Update
                                                                </a>

                                                                <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                                    data-bs-target="#project_documentDeleteModal_{{ $project_document->id }}"><i class="fa-solid fa-trash"></i>
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
                            <!--Key deliver-->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <strong> Key Deliver:</strong>
                                    </div>

                                    <div class="col-12">
                                        @if (!$project_initiation->key_deliveres->count() == 0)
                                            <table class="table table-sm table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>SL No.</th>
                                                        <th>Project Initiation</th>
                                                        <th>Subject</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($project_initiation->key_deliveres as $key => $key_delivery)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $project_initiation->name }}</td>
                                                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $key_delivery->subject }}</td>
                                                            <td>
                                                                <button class="btn btn-info text-white btn-sm" data-bs-toggle="modal"
                                                                    data-bs-target="#project_initiation_issue_read_Modal_{{ $key_delivery->id }}"><i class="fa-solid fa-book-open"></i> Read</button>
                                                                <a href="{{ route("key_deliverable.delete", $key_delivery->id) }}" target='_blank' onclick="return confirm('Are you sure?')"
                                                                    class=" btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                                                    Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            There are no project issues create yet!
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
    @include("backend.pages.project_initiation.project_initiation_assign_member_modal")
    @include("backend.pages.project_initiation.project_initiation_time_modal")
    @include("backend.pages.project_initiation.project_initiation_key_deliverable_modal")
    @include("backend.pages.project_initiation.project_initiation_key_deliverable_read_modal")
    @include("backend.pages.project_initiation.project_initiation_user_designation_modal")
    @include("backend.pages.project_initiation.project_initiation_user_task_assign_modal")
    @include("includes.ck_editor")
    @include("backend.pages.project_initiation.project_inititation_task_list_modal")
    @include("backend.pages.project_initiation.project_initiation_submission_modal")

@endsection
