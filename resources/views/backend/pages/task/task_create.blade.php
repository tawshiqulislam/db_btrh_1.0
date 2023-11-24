@extends("backend.layouts.master")

@section("content")
    <!--page title-->
    <div class="pagetitle">
        <h1>Task</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("task.index") }}">Task</a></li>
                <li class="breadcrumb-item active">Assign Task</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!--main container-->
    <div class="container">

        <form action="{{ route("task.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!--project initiation-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="project_initiation_id">Project Initiation: </label>
                        <select class="form-control" name="project_initiation_id" id="project_initiation_id">
                            <option selected disabled>--Select project initiation--</option>
                            @foreach ($project_initiations as $project_initiation)
                                <option value="{{ $project_initiation->id }}">{{ $project_initiation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!--project initiation assigned to-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="assigned_to">Assign To:</label>
                        <select class="form-control" name="assigned_to" id="assigned_to">
                            <option selected disabled>--Select user--</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!--task name-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="task">Task:</label>
                        <textarea placeholder="Write task" class="form-control" name="task" id="editor_2" cols="30" rows="10"></textarea>
                        @if ($errors->has("task"))
                            <p class="text-danger">{{ $errors->first("task") }}</p>
                        @endif
                    </div>
                </div>
                <!--task deadline-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="deadline">Deadline:</label>
                        <input type="date" class="form-control" id="deadline" name="deadline">
                        @if ($errors->has("deadline"))
                            <p class="text-danger">{{ $errors->first("deadline") }}</p>
                        @endif
                    </div>
                </div>
                <!--document upload-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="document">Document:</label>
                        <input type="file" class="form-control" id="document" name="document">
                        @if ($errors->has("document"))
                            <p class="text-danger">{{ $errors->first("document") }}</p>
                        @endif
                    </div>
                </div>

                <!--task status-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="status">Task Status:</label>
                        <select class="form-control" name="status" id="status">
                            <option selected disabled>--Select status--</option>
                            @foreach ($statuss as $status)
                                <option value="{{ $status->status }}">{{ $status->status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!--submit button-->
            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>

    </div>
    @include("includes.ck_editor")
@endsection
