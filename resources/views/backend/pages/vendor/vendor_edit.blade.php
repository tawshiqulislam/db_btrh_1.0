@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Vendor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("vendor.index") }}">Vendor</a></li>
                <li class="breadcrumb-item active">Edit Vendor</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">

        <form action="{{ route("vendor.update", $vendor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="userName">Name:</label>
                        <input value="{{ $vendor->name }}" placeholder="Enter vendor name" type="text" class="form-control" id="userName" name="name" required>
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user_name">Username:</label>
                        <input value="{{ $vendor->username }}" placeholder="Enter username" type="text" class="form-control" id="user_name" name="username" required>
                        @if ($errors->has("username"))
                            <p class="text-danger">{{ $errors->first("username") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input value="{{ $vendor->email }}" placeholder="Enter vendors email" type="email" class="form-control" id="email" name="email" required>
                        @if ($errors->has("email"))
                            <p class="text-danger">{{ $errors->first("email") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_no">Phone Number:</label>
                        <input value="{{ $vendor->phone_no }}" placeholder="Enter vendors phone number" type="text" class="form-control" id="phone_no" name="phone_no" required>
                        @if ($errors->has("phone_no"))
                            <p class="text-danger">{{ $errors->first("phone_no") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input value="{{ $vendor->address }}" placeholder="Enter address" type="text" class="form-control" id="address" name="address" required>
                        @if ($errors->has("address"))
                            <p class="text-danger">{{ $errors->first("address") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_number">ID Number(Birth Registration/NID/Passport):</label>
                        <input value="{{ $vendor->id_number }}" placeholder="Enter ID number" type="text" class="form-control" id="id_number" name="id_number" required>
                        @if ($errors->has("id_number"))
                            <p class="text-danger">{{ $errors->first("id_number") }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_type">ID Type(Birth Registration/NID/Passport):</label>
                        <select name="id_type" id="id_type" class="form-control" required>
                            <option value="{{ $vendor->id_type }}">{{ $vendor->id_type }}</option>

                            <option value="Birth Registration">Birth Registration</option>
                            <option value="NID">NID</option>
                            <option value="Passport">Passport</option>
                        </select>
                        @if ($errors->has("id_type"))
                            <p class="text-danger">{{ $errors->first("id_type") }}</p>
                        @endif
                    </div>
                </div>

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1">Security Question 1:</label>
                        <select name="sq_no_1" id="sq_no_1" class="form-control">
                            <option value="{{ $vendor->sq_no_1 }}">{{ $vendor->sq_no_1 }}</option>
                            @foreach ($security_questions as $security_question)
                                <option value="{{ $security_question->name }}">{{ $security_question->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1_ans">Security Question 1 Answer:</label>
                        <input value="{{ $vendor->sq_no_1_ans }}" placeholder="Enter answer" type="text" class="form-control" id="sq_no_1_ans" name="sq_no_1_ans">
                    </div>
                </div> --}}

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1">Security Question 2:</label>
                        <select name="sq_no_2" id="sq_no_2" class="form-control">
                            <option value="{{ $vendor->sq_no_2 }}">{{ $vendor->sq_no_2 }}</option>
                            @foreach ($security_questions as $security_question)
                                <option value="{{ $security_question->name }}">{{ $security_question->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_2_ans">Security Question 2 Answer:</label>
                        <input value="{{ $vendor->sq_no_2_ans }}" placeholder="Enter answer" type="text" class="form-control" id="sq_no_2_ans" name="sq_no_2_ans">
                    </div>
                </div> --}}
                <!--current picture-->
                <div class="col-md-12" id="current_image">
                    <label for="current_image">Current Image:</label><br>
                    @if ($vendor->pro_pic)
                        <img style="width: 100px" class="border border-1 p-1" src="{{ asset("storage/vendor/" . $vendor->pro_pic) }}" alt="{{ $vendor->name }}">
                    @else
                        <img style="width: 100px" class="border border-1 p-1" src="{{ asset("image/no_image.png") }}" alt="no image">
                    @endif
                </div>
                <!-- uploaded image (hidden by default) -->
                <div class="col-md-12" id="uploaded_image" style="display: none;">
                    <label for="uploaded_image">Uploaded Image:</label><br>
                    <img style="width: 100px" class="border border-1 p-1" id="uploaded_image_display" src="" alt="">
                </div>
                <!--profile picture-->
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
                        <input value="{{ $vendor->date_of_birth }}" type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>
                </div>

                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if ($errors->has("password"))
                            <p class="text-danger">{{ $errors->first("password") }}</p>
                        @endif
                    </div>
                </div> --}}

                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <label>Registration as:</label>
                        <div class="form-check">
                            <input value="office" class="form-check-input" type="radio" name="user_type" id="user_type_office">
                            <label class="form-check-label" for="user_type_office">vendor</label>
                        </div>
                        <div class="form-check">
                            <input value="vendor" class="form-check-input" type="radio" name="user_type" id="user_type_vendor">
                            <label class="form-check-label" for="user_type_vendor">Vendor</label>
                        </div>
                        @if ($errors->has("user_type"))
                            <p class="text-danger">{{ $errors->first("user_type") }}</p>
                        @endif
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="document">Upload Vendor Documents:</label>
                        <input type="file" class="form-control" id="document" name="document">
                        @if ($errors->has("document"))
                            <p class="text-danger">{{ $errors->first("document") }}</p>
                        @endif
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
    @include("includes.user_create_registration_edit_document_upload_script")
    @include("includes.current_image_uploaded_image_preview_script")
@endsection
