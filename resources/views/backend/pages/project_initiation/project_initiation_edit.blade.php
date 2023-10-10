@extends("backend.layouts.master")
@section("content")
    <!--  Page Title -->
    <div class="pagetitle">
        <h1>Project Initiation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_initiation.index") }}">Project Initiation</a></li>
                <li class="breadcrumb-item active">Edit Project Initiation</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!--main container-->
    <div class="container">
        <form action="{{ route("project_initiation.update", $project_initiation->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!--project initiation name-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Project Initiation Name:</label>
                        <input value="{{ $project_initiation->name }}" placeholder="Enter project initiation name"
                            type="text" class="form-control" id="name" name="name" required>
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>
                <!--project cetegory-->

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="project_category_id">Project Category:</label>
                        <select class="form-control" name="project_category_id" id="project_category_id" required>
                            <option value="{{ $project_initiation->project_category->id }}">
                                {{ $project_initiation->project_category->name }}
                            </option>
                            @foreach ($project_categorys as $project_category)
                                <option value="{{ $project_category->id }}">{{ $project_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--project description-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea placeholder="Write description" class="form-control" name="description" id="editor_1" cols="30"
                            rows="10">{{ $project_initiation->description }}</textarea>
                        @if ($errors->has("description"))
                            <p class="text-danger">{{ $errors->first("description") }}</p>
                        @endif
                    </div>
                </div>

                <!--project goal-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="goal">Goal:</label>
                        <textarea placeholder="Write project goal" class="form-control" name="goal" id="editor_2" cols="30"
                            rows="10">{{ $project_initiation->description }}</textarea>
                        @if ($errors->has("goal"))
                            <p class="text-danger">{{ $errors->first("goal") }}</p>
                        @endif
                    </div>
                </div>
                <!--project deadline-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="deadline">Deadline:</label>
                        <input value="{{ $project_initiation->deadline }}" type="date" class="form-control"
                            id="deadline" name="deadline" required>
                        @if ($errors->has("deadline"))
                            <p class="text-danger">{{ $errors->first("deadline") }}</p>
                        @endif
                    </div>
                </div>
                <!--required file upload-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="required_file">Required File:</label>
                        <input value=' {{ $project_initiation->required_file }}' type="file" class="form-control"
                            id="required_file" name="required_file">
                        @if ($errors->has("required_file"))
                            <p class="text-danger">{{ $errors->first("required_file") }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <!--update button-->
            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
    @include("includes.ck_editor")
@endsection
