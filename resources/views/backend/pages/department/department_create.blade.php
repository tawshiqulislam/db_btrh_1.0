@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1 class="mb-2">Department</h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("department.index") }}">Department</a></li>
                <li class="breadcrumb-item active">Add Department</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->
    <div class="container form_create">

        <form action="{{ route("department.store") }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Department Name:</label>
                        <input type="text" placeholder="Enter department" class="form-control" id="name"
                            name="name" required>
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_email">User:</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="user_email" id="user_email" class="form-control">
                                    <option selected disabled>Select User
                                    </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->email }}">{{ $user->name }}({{ $user->email }})
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
