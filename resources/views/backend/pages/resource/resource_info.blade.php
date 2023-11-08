@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Resource</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_initiation.index") }}">Resource</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main container -->
    <div class="container">
        <a href="{{ route("resource.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single project_initiation Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-12">
                            <div class="card-header">
                                <div class="button-group d-flex justify-content-end  gap-2 mb-2">
                                    <a href="{{ route("resource.edit", $resource->id) }}" class=" btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-pen"></i>
                                        Edit</a>
                                    <span class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            Assign Resource
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#resourceAssignUserModal">Assign to User</a></li>
                                            <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#resourceAssignProjectModal">Assign to Project</a></li>
                                        </ul>
                                    </span>
                                </div>
                                <h5>{{ $resource->name ?? "" }}</h5>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <p class="card-text"><strong>Description:</strong>{!! $resource->description ?? "" !!}</p>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <p class="card-text"><strong>Resource Type:</strong> {{ $resource->resource_type ?? "" }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="card-text"><strong>Quantity:</strong> {{ $resource->quantity ?? "" }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="card-text"><strong>Cost:</strong> {{ $resource->cost ?? "" }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="card-text"><strong>Date Added:</strong> {{ $resource->date_added ?? "" }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="card-text"><strong>Added By:</strong> {{ $resource->added_by_user->username ?? "" }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="card-text"><strong>Added By:</strong> {{ $resource->added_by_user->username ?? "" }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="card-text"><strong>Added By:</strong> {{ $resource->added_by_user->username ?? "" }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="card-text"><strong>Documents:</strong> <a href="{{ asset("storage/resource/" . $resource->document) }}">{{ $resource->document }}</a>
                            </p>
                        </div>

                        @if ($resource->resource_managements->count() != 0)
                            <div class="col-md-12">
                                <p class="card-text"><strong>Assigned Resource:</strong></p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Assigned User</th>
                                            <th>Assigned Project</th>
                                            <th>Assigned By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resource->resource_managements as $resource_management)
                                            <tr>
                                                <td>{{ ++$sl ?? " " }}</td>
                                                <td>{{ $resource_management->user->username ?? "" }}</td>
                                                <td>{{ $resource_management->project_initiation->name ?? "" }}</td>
                                                <td>{{ $resource_management->assigned_by_user->username ?? "" }}</td>
                                                <td>
                                                    <a href="{{ route("resource_management.delete", $resource->id) }}" onclick="confirm('Do you want to delete?')" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include("backend.pages.resource.resource_assign_user_modal")
    @include("backend.pages.resource.resource_assign_project_modal")
@endsection
