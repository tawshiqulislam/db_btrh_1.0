@extends("backend.layouts.master")
@section("content")
    <!--page title-->
    <div class="pagetitle">
        <h1>User Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("user_detail.index") }}">User Detail</a></li>
                <li class="breadcrumb-item active">Add User Detail</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!--main container-->
    <div class="container">

        <form action="{{ route("user_detail.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!--user list-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_id">Select User:</label>
                        <select class="form-control" name="user_id" id="user_id" required>
                            <option selected disabled><--Select user--></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has("user_id"))
                            <p class="text-danger">{{ $errors->first("user_id") }}</p>
                        @endif
                    </div>
                </div>
                <!--File name-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">File Name:</label>
                        <input placeholder="Enter file name" type="text" class="form-control" id="name"
                            name="name" required>
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>

                <!-- file upload-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="file">Required File:</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                        @if ($errors->has("file"))
                            <p class="text-danger">{{ $errors->first("file") }}</p>
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
@endsection
