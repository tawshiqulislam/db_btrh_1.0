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
        <a href="{{ route("project_initiation.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single project_initiation Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-12">
                            <div class="card-header d-flex justify-content-between">

                                <h5>{{ $project_initiation->name ?? "" }}</h5>

                                <a href="{{ route("project_initiation.edit", $project_initiation->id) }}"
                                    class=" btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-pen"></i>
                                    Edit</a>

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
                                    <p class="card-text"><strong>Required File:</strong> <a target="_blank"
                                            href="{{ asset("storage/project_initiation/" . $project_initiation->required_file) }}">{{ $project_initiation->required_file }}</a>
                                    </p>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
