@extends("backend.layouts.master")

@section("content")
    <!--page title-->
    <div class="pagetitle">
        <h1>Resource</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("resource.index") }}">Resource</a></li>
                <li class="breadcrumb-item active">Add Resource</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!--main container-->
    <div class="container">

        <form action="{{ route("resource.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!--Resource name-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Resource Name:</label>
                        <input placeholder="Enter resource name" type="text" class="form-control" id="name" name="name" required>
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>
                <!--Resource description-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea placeholder="Write description" class="form-control" name="description" id="editor_1" cols="30" rows="10"></textarea>
                        @if ($errors->has("description"))
                            <p class="text-danger">{{ $errors->first("description") }}</p>
                        @endif
                    </div>
                </div>
                <!--Resource name-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="resource_type">Resource Type:</label>
                        <input placeholder="Enter resource type" type="text" class="form-control" id="resource_type" name="resource_type" required>
                        @if ($errors->has("resource_type"))
                            <p class="text-danger">{{ $errors->first("resource_type") }}</p>
                        @endif
                    </div>
                </div>
                <!--Resource quantity-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="quantity">Resource Quantity:</label>
                        <input placeholder="Enter quantity" type="number" class="form-control" id="quantity" name="quantity">
                        @if ($errors->has("quantity"))
                            <p class="text-danger">{{ $errors->first("quantity") }}</p>
                        @endif
                    </div>
                </div>
                <!--Resource cost-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="cost">Resource Cost:</label>
                        <input placeholder="Enter cost" type="number" class="form-control" id="cost" name="cost">
                        @if ($errors->has("cost"))
                            <p class="text-danger">{{ $errors->first("cost") }}</p>
                        @endif
                    </div>
                </div>
                <!--required file upload-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="document">Document:</label>
                        <input type="file" class="form-control" id="document" name="document">
                        @if ($errors->has("document"))
                            <p class="text-danger">{{ $errors->first("document") }}</p>
                        @endif
                    </div>
                </div>

                <!--Resource added-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="date_added">Resource Added:</label>
                        <input type="date" class="form-control" id="date_added" name="date_added">
                        @if ($errors->has("date_added"))
                            <p class="text-danger">{{ $errors->first("date_added") }}</p>
                        @endif
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
