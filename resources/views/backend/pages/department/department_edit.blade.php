@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Department</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("department.index") }}">Department</a></li>
                <li class="breadcrumb-item active">Edit Department</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">

        <form action="{{ route("department.update", $department->id) }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Department Name:</label>
                        <input value="{{ $department->name }}" type="text" placeholder="Enter department"
                            class="form-control" id="name" name="name" required>
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="user_id" id="user_id" class="form-control">
                                    @if ($select_user)
                                        <option value="{{ $select_user->id }}">
                                            {{ $select_user->name }}({{ $select_user->email }})
                                        </option>
                                    @else
                                        <option value="">
                                            Select
                                        </option>
                                    @endif
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="designation" id="designation" class="form-control">
                                    <option value="{{ $department->designation }}">{{ $department->designation }}</option>
                                    <option value="">Select</option>
                                    @foreach ($adminlists as $adminlist)
                                        <option value="{{ $adminlist->user_type }}">{{ $adminlist->user_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
@endsection
