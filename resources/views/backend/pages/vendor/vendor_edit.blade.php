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

        <form class="form_create" action="{{ route("vendor.update", $vendor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <!-- Company Name -->
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input value="{{ $vendor->company_name }}" type="text" class="form-control" id="company_name" name="company_name" placeholder='Enter company name' required>
                    </div>
                    @if ($errors->has("company_name"))
                        <p class="text-danger">{{ $errors->first("company_name") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- Company Address -->
                    <div class="form-group">
                        <label for="company_address">Company Address</label>
                        <textarea class="form-control" id="company_address" name="company_address" rows="3" required>{{ $vendor->company_address }}</textarea>
                    </div>
                    @if ($errors->has("company_address"))
                        <p class="text-danger">{{ $errors->first("company_address") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- Company Email Address -->
                    <div class="form-group">
                        <label for="company_email_address">Company Email Address</label>
                        <input value="{{ $vendor->company_email_address }}" type="email" class="form-control" id="company_email_address" name="company_email_address" required>
                    </div>
                    @if ($errors->has("company_email_address"))
                        <p class="text-danger">{{ $errors->first("company_email_address") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- Key Contact Person Name -->
                    <div class="form-group">
                        <label for="company_key_contact_person_name">Key Contact Person Name</label>
                        <input value="{{ $vendor->company_key_contact_person_name }}" type="text" class="form-control" id="company_key_contact_person_name" name="company_key_contact_person_name"
                            required>
                    </div>
                    @if ($errors->has("company_key_contact_person_name"))
                        <p class="text-danger">{{ $errors->first("company_key_contact_person_name") }}</p>
                    @endif
                </div>

                <div class="col-md-12">
                    <!-- Designation of Key Contact Person -->
                    <div class="form-group">
                        <label for="designation_of_key_contact_person">Designation of Key Contact Person</label>
                        <input value="{{ $vendor->designation_of_key_contact_person }}" type="text" class="form-control" id="designation_of_key_contact_person" name="designation_of_key_contact_person"
                            required>
                    </div>
                    @if ($errors->has("designation_of_key_contact_person"))
                        <p class="text-danger">{{ $errors->first("designation_of_key_contact_person") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- Key Contact Person Email Address -->
                    <div class="form-group">
                        <label for="key_contact_person_email_address">Key Contact Person Email Address</label>
                        <input value="{{ $vendor->key_contact_person_email_address }}" type="email" class="form-control" id="key_contact_person_email_address" name="key_contact_person_email_address"
                            required>
                    </div>
                    @if ($errors->has("key_contact_person_email_address"))
                        <p class="text-danger">{{ $errors->first("key_contact_person_email_address") }}</p>
                    @endif
                </div>

                {{-- <div class="col-md-6">
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
                </div> --}}
                <div class="col-md-6">
                    <!-- VAT BIN Number -->
                    <div class="form-group">
                        <label for="vat_bin_no">VAT/BIN Number</label>
                        <input value="{{ $vendor->vat_bin_no }}" type="text" class="form-control" id="vat_bin_no" name="vat_bin_no">
                    </div>
                    @if ($errors->has("vat_bin_no"))
                        <p class="text-danger">{{ $errors->first("vat_bin_no") }}</p>
                    @endif
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
                {{-- <div class="col-md-12" id="current_image">
                    <label for="current_image">Current Image:</label><br>
                    @if ($vendor->pro_pic)
                        <img style="width: 100px" class="border border-1 p-1" src="{{ asset("storage/vendor/" . $vendor->pro_pic) }}" alt="{{ $vendor->name }}">
                    @else
                        <img style="width: 100px" class="border border-1 p-1" src="{{ asset("image/no_image.png") }}" alt="no image">
                    @endif
                </div> --}}
                <!-- uploaded image (hidden by default) -->
                {{-- <div class="col-md-12" id="uploaded_image" style="display: none;">
                    <label for="uploaded_image">Uploaded Image:</label><br>
                    <img style="width: 100px" class="border border-1 p-1" id="uploaded_image_display" src="" alt="">
                </div> --}}
                <!--profile picture-->
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="pro_pic">Profile Picture:</label>
                        <input type="file" class="form-control" id="pro_pic" name="pro_pic">
                        @if ($errors->has("pro_pic"))
                            <p class="text-danger">{{ $errors->first("pro_pic") }}</p>
                        @endif
                    </div>
                </div> --}}

                <div class="col-md-6">
                    <!-- TIN Number -->
                    <div class="form-group">
                        <label for="tin_no">TIN Number</label>
                        <input value="{{ $vendor->tin_no }}" type="text" class="form-control" id="tin_no" name="tin_no">
                    </div>
                    @if ($errors->has("tin_no"))
                        <p class="text-danger">{{ $errors->first("tin_no") }}</p>
                    @endif
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
