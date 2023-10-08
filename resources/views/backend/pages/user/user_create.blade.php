@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("user.index") }}">User</a></li>
                <li class="breadcrumb-item active">Add User</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">
        <h2>Add User</h2>
        <form action="{{ route("user.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="userName">Name:</label>
                        <input placeholder="Enter your name" type="text" class="form-control" id="userName"
                            name="name" required>
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user_name">Username:</label>
                        <input placeholder="Enter username" type="text" class="form-control" id="user_name"
                            name="username" required>
                        @if ($errors->has("username"))
                            <p class="text-danger">{{ $errors->first("username") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input placeholder="Enter your email" type="email" class="form-control" id="email"
                            name="email" required>
                        @if ($errors->has("email"))
                            <p class="text-danger">{{ $errors->first("email") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_no">Phone Number:</label>
                        <input placeholder="Enter phone number" type="text" class="form-control" id="phone_no"
                            name="phone_no" required>
                        @if ($errors->has("phone_no"))
                            <p class="text-danger">{{ $errors->first("phone_no") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input placeholder="Enter address" type="text" class="form-control" id="address" name="address"
                            required>
                        @if ($errors->has("address"))
                            <p class="text-danger">{{ $errors->first("address") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_number">ID Number(Birth Registration/NID/Passport):</label>
                        <input placeholder="Enter ID number" type="text" class="form-control" id="id_number"
                            name="id_number" required>
                        @if ($errors->has("id_number"))
                            <p class="text-danger">{{ $errors->first("id_number") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_type">ID Type(Birth Registration/NID/Passport):</label>
                        <select name="id_type" id="id_type" class="form-control" required>
                            <option value="Birth Registration">Birth Registration</option>
                            <option value="NID">NID</option>
                            <option value="Passport">Passport</option>
                        </select>
                        @if ($errors->has("id_type"))
                            <p class="text-danger">{{ $errors->first("id_type") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1">Security Question 1:</label>
                        <select name="sq_no_1" id="sq_no_1" class="form-control">
                            <option selected disabled>Select security question</option>
                            @foreach ($security_questions as $security_question)
                                <option value="{{ $security_question->name }}">{{ $security_question->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1_ans">Security Question 1 Answer:</label>
                        <input placeholder="Enter answer" type="text" class="form-control" id="sq_no_1_ans"
                            name="sq_no_1_ans">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1">Security Question 2:</label>
                        <select name="sq_no_2" id="sq_no_2" class="form-control">
                            <option selected disabled>Select security question</option>
                            @foreach ($security_questions as $security_question)
                                <option value="{{ $security_question->name }}">{{ $security_question->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_2_ans">Security Question 2 Answer:</label>
                        <input placeholder="Enter answer" type="text" class="form-control" id="sq_no_2_ans"
                            name="sq_no_2_ans">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pro_pic">Profile Picture:</label>
                        <input type="file" class="form-control" id="pro_pic" name="pro_pic">
                        @if ($errors->has("pro_pic"))
                            <p class="text-danger">{{ $errors->first("pro_pic") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                        @if ($errors->has("date_of_birth"))
                            <p class="text-danger">{{ $errors->first("date_of_birth") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @if ($errors->has("password"))
                            <p class="text-danger">{{ $errors->first("password") }}</p>
                        @endif
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
@endsection
