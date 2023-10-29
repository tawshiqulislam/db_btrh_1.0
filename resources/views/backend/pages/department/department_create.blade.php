@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>Department</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("department.index") }}">Department</a></li>
                <li class="breadcrumb-item active">Add Department</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->
    <div class="container">

        <form action="{{ route("department.store") }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Department Name:</label>
                        <input type="text" placeholder="Enter department" class="form-control" id="name" name="name" required>
                        @if ($errors->has("name"))
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <div class="row">
                            <div class="col-md-12 d-flex gap-3">

                                @foreach ($users as $user)
                                    <div class="form-group form-check">
                                        <input value="{{ $user->id }}" type="checkbox" class="form-check-input" name="user_ids[]" id="exampleCheck_{{ $user->id }}" data-designation-id="designation_{{ $user->id }}">
                                        <label class="form-check-label" for="exampleCheck_{{ $user->id }}">{{ $user->username }}</label>
                                        <div class="form-group" id="designation_{{ $user->id }}" style="display: none;">
                                            <input class="form-control" type="text" name="designations[{{ $user->id }}]" placeholder="Enter Designation">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="designation" id="designation" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($adminlists as $adminlist)
                                        <option value="{{ $adminlist->user_type }}">{{ $adminlist->user_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3 text-white">
                <i class="fa-solid fa-floppy-disk"></i> Save
            </button>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    var designationId = checkbox.getAttribute("data-designation-id");
                    var designationField = document.getElementById(designationId);

                    if (checkbox.checked) {
                        designationField.style.display = "block";
                    } else {
                        designationField.style.display = "none";
                    }
                });
            });
        });
    </script>
@endsection
