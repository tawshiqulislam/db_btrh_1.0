@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Vendor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("vendor.index") }}">Vendor</a></li>
                <li class="breadcrumb-item active">Add Vendor</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">

        <form class="form_create" action="{{ route("vendor.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <!-- Company Name -->
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder='Enter company name' required>
                    </div>
                    @if ($errors->has("company_name"))
                        <p class="text-danger">{{ $errors->first("company_name") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- Company Address -->
                    <div class="form-group">
                        <label for="company_address">Company Address</label>
                        <textarea class="form-control" id="company_address" name="company_address" rows="3" required></textarea>
                    </div>
                    @if ($errors->has("company_address"))
                        <p class="text-danger">{{ $errors->first("company_address") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- Company Email Address -->
                    <div class="form-group">
                        <label for="company_email_address">Company Email Address</label>
                        <input type="email" class="form-control" id="company_email_address" name="company_email_address" required>
                    </div>
                    @if ($errors->has("company_email_address"))
                        <p class="text-danger">{{ $errors->first("company_email_address") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- Key Contact Person Name -->
                    <div class="form-group">
                        <label for="company_key_contact_person_name">Key Contact Person Name</label>
                        <input type="text" class="form-control" id="company_key_contact_person_name" name="company_key_contact_person_name" required>
                    </div>
                    @if ($errors->has("company_key_contact_person_name"))
                        <p class="text-danger">{{ $errors->first("company_key_contact_person_name") }}</p>
                    @endif
                </div>

                <div class="col-md-12">
                    <!-- Designation of Key Contact Person -->
                    <div class="form-group">
                        <label for="designation_of_key_contact_person">Designation of Key Contact Person</label>
                        <input type="text" class="form-control" id="designation_of_key_contact_person" name="designation_of_key_contact_person" required>
                    </div>
                    @if ($errors->has("designation_of_key_contact_person"))
                        <p class="text-danger">{{ $errors->first("designation_of_key_contact_person") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- Key Contact Person Email Address -->
                    <div class="form-group">
                        <label for="key_contact_person_email_address">Key Contact Person Email Address</label>
                        <input type="email" class="form-control" id="key_contact_person_email_address" name="key_contact_person_email_address" required>
                    </div>
                    @if ($errors->has("key_contact_person_email_address"))
                        <p class="text-danger">{{ $errors->first("key_contact_person_email_address") }}</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <!-- Trade License Number -->
                    <div class="form-group">
                        <label for="trade_license_no">Trade License Number</label>
                        <input value="{{ $vendor->trade_license_no }}" type="text" class="form-control" id="trade_license_no" name="trade_license_no">
                    </div>
                    @if ($errors->has("trade_license_no"))
                        <p class="text-danger">{{ $errors->first("trade_license_no") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- VAT BIN Number -->
                    <div class="form-group">
                        <label for="vat_bin_no">VAT/BIN Number</label>
                        <input type="text" class="form-control" id="vat_bin_no" name="vat_bin_no">
                    </div>
                    @if ($errors->has("vat_bin_no"))
                        <p class="text-danger">{{ $errors->first("vat_bin_no") }}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <!-- TIN Number -->
                    <div class="form-group">
                        <label for="tin_no">TIN Number</label>
                        <input type="text" class="form-control" id="tin_no" name="tin_no">
                    </div>
                    @if ($errors->has("tin_no"))
                        <p class="text-danger">{{ $errors->first("tin_no") }}</p>
                    @endif
                </div>

                <div class="col-md-12">
                    <!-- Documents -->
                    <div class="form-group">
                        <label for="document">Documents</label>
                        <input type="file" class="form-control-file form-control" id="document" name="document">
                    </div>
                </div>

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1">Security Question 1:</label>
                        <select name="sq_no_1" id="sq_no_1" class="form-control">
                            <option value="">Select security question</option>
                            @foreach ($security_questions as $security_question)
                                <option value="{{ $security_question->name }}">{{ $security_question->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1_ans">Security Question 1 Answer:</label>
                        <input placeholder="Enter answer" type="text" class="form-control" id="sq_no_1_ans" name="sq_no_1_ans">
                    </div>
                </div> --}}

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_1">Security Question 2:</label>
                        <select name="sq_no_2" id="sq_no_2" class="form-control">
                            <option value="">Select security question</option>
                            @foreach ($security_questions as $security_question)
                                <option value="{{ $security_question->name }}">{{ $security_question->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="sq_no_2_ans">Security Question 2 Answer:</label>
                        <input placeholder="Enter answer" type="text" class="form-control" id="sq_no_2_ans" name="sq_no_2_ans">
                    </div>
                </div> --}}
                <!-- uploaded image -->
                {{-- <div class="col-md-12" style='display:none' id='image_preview_div'>
                    <div class="form-group">
                        <label for="uploaded_image">Vendor Image:</label><br>
                        <img style="width: 100px" class="border border-1 p-1" id="uploaded_image" src="" alt="">
                    </div>
                </div> --}}
                <!-- Profile picture -->
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="pro_pic">Profile Picture:</label>
                        <input type="file" class="form-control" id="pro_pic" name="pro_pic">
                        @if ($errors->has("pro_pic"))
                            <p class="text-danger">{{ $errors->first("pro_pic") }}</p>
                        @endif
                    </div>
                </div> --}}
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                        @if ($errors->has("date_of_birth"))
                            <p class="text-danger">{{ $errors->first("date_of_birth") }}</p>
                        @endif
                    </div>
                </div> --}}

                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input placeholder="Enter your password" type="password" class="form-control" id="password" name="password" required>
                        @if ($errors->has("password"))
                            <p class="text-danger">{{ $errors->first("password") }}</p>
                        @endif
                    </div>
                </div> --}}

                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <label>Registration as:</label>
                        <div class="form-check">
                            <input value="vendor" class="form-check-input" type="radio" name="user_type" id="user_type_user">
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
                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="document">Upload Vendor Documents:</label>
                        <input type="file" class="form-control" id="document" name="document">
                        @if ($errors->has("document"))
                            <p class="text-danger">{{ $errors->first("document") }}</p>
                        @endif
                    </div>
                </div> --}}

            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
    @include("includes.user_create_registration_edit_document_upload_script")
    @include("includes.uploaded_image_preview_script")
@endsection
