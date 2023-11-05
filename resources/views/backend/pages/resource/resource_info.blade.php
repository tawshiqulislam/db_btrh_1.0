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
                                    <a href="{{ route("resource.edit", $resource->id) }}" class=" btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-pen"></i>
                                        Edit</a>
                                </div>
                                <h5>{{ $resource->name ?? "" }}</h5>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <p class="card-text"><strong>Project:</strong>
                                    {{ $resource->project_initiation->name ?? "" }}</p>
                            </div>
                            <div class="col-md-12">
                                <p class="card-text"><strong>Project:</strong>{!! $resource->description ?? "" !!}</p>
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
                            <p class="card-text"><strong>Date Added:</strong> <a href="{{ asset("storage/resource/" . $resource->document) }}">{{ $resource->document }}</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
