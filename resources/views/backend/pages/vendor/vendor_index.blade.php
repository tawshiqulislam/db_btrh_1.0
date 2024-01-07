@extends("backend.layouts.master")
@section("content")

    <div class="pagetitle">
        <h1>Vendor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("vendor.index") }}">Vendor</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($vendors->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no vendor added yet.</h4>
            <a href="{{ route("vendor.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Vendor</a>
        </div>
    @else
        <div class="container table_create">
            <a href="{{ route("vendor.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                Add Vendor</a>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Company Name</th>
                            <th>Company Key Contact Person</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $vendor->company_name ?? "" }}</td>
                                <td>{{ $vendor->company_key_contact_person_name ?? "" }}</td>
                                <td>
                                    <a href="{{ route("vendor.info", $vendor->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-circle-info"></i> Info</a>
                                    <a href="{{ route("vendor.edit", $vendor->id) }}" class="btn btn-primary btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit</a>
                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#vendorDeleteModal_{{ $vendor->id }}"><i class="fa-solid fa-trash"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $vendors->links("pagination::bootstrap-4") }}
        </div>
    @endif
    @include("backend.pages.vendor.vendor_delete_confirmation_modal")
@endsection
