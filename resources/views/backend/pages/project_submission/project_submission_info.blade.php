@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Submission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_submission.index") }}">Project Submission</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main container -->
    <div class="container">
        <a href="{{ route("project_submission.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single project_initiation Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        @php
                            $project_initiation = $project_submission->project_initiation;
                        @endphp

                        {{ $project_submission->project_initiation->name }}
                        @role(["super_admin", "admin"])
                            @if ($project_submission->isApproved == true)
                                <button class="btn btn-danger text-white btn-sm float-end ms-2" data-bs-toggle="modal" data-bs-target="#project_submission_project_notification_Modal"><i
                                        class="fa-solid fa-box-tissue"></i>
                                    Send Project Notification</button>
                            @endif
                            @if ($project_submission->isApproved == false)
                                <a onclick="return confirm('Are you sure?')" href="{{ route("project_submission.approved", $project_submission->id) }}" class=" btn btn-warning text-white btn-sm float-end"><i
                                        class="fa-solid fa-eye"></i>
                                    Approve Project</a>
                            @endif
                            @if ($project_submission->isApproved == true)
                                <a data-bs-toggle="modal" data-bs-target="#disburseProjectPaymentModal" type="button" class=" btn btn-success text-white btn-sm float-end">
                                    <i class="fa-solid fa-sack-dollar"></i>
                                    Send for disbursing payment</a>
                            @endif
                        @endrole
                    </div>
                    <div class="card-body mt-2">
                        <p><strong>Project Description: </strong>{{ $project_submission->description ?? "" }}</p>
                        <p><strong>Note: </strong>{{ $project_submission->comment ?? "" }}</p>
                        <p><strong>File: </strong><a target="_blank" href="{{ asset("storage/project_submission/" . $project_submission->file) }}">Project File</a></p>
                        <p><strong>Project URL: </strong>{{ $project_submission->link ?? "" }}</p>
                        <p><strong>Status: </strong>{{ $project_submission->status ?? "" }}</p>
                        <p><strong>Submitted By: </strong>{{ $project_submission->user->username ?? "" }}</p>
                        <p><strong>isApproved: </strong>{{ $project_submission->isApproved ? "Yes" : "No" }}</p>
                        <p><strong>Accepted By: </strong>{{ $project_submission->project_approved_by_user->username ?? "Not accepted yet!" }}</p>
                        <div class="row">
                            <div class="col-12">
                                <strong> Project Notification:</strong>
                            </div>

                            <div class="col-12">
                                @if (!$project_submission->project_notifications->count() == 0)
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL No.</th>
                                                <th>Project</th>
                                                <th>Subject</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($project_submission->project_notifications as $key => $project_notification)
                                                <tr>

                                                    <td>{{ ++$key }}</td>
                                                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $project_submission->project_initiation->name }}</td>
                                                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $project_notification->subject }}</td>
                                                    <td>
                                                        <button class="btn btn-info text-white btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#project_submission_project_notification_read_Modal_{{ $project_notification->id }}"><i class="fa-solid fa-book-open"></i>
                                                            Read</button>
                                                        @role(["super_admin", "admin"])
                                                            <a href="{{ route("project_notification.delete", $project_notification->id) }}" onclick="return confirm('Are you sure?')"
                                                                class=" btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                                                Delete</a>
                                                        @endrole
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    There are no project notification create yet!
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include("backend.pages.project_submission.project_submission_disbursing_project_payment_modal")
    @include("backend.pages.project_submission.project_submission_project_notification_modal")
    @include("backend.pages.project_submission.project_submission_project_notification_read_modal")
@endsection
