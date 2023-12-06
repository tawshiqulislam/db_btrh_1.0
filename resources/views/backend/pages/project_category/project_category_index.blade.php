@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Project Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_category.index") }}">Project Category</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main content -->
    <!-- if there are no data in project categories table -->
    @if ($project_categorys->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no project category added yet.</h4>
            @role(["super_admin", "admin"])
                <a href="{{ route("project_category.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                    Add Project Category</a>
            @endrole

        </div>
        <!-- if data are present in project categories table -->
    @else
        <div class="container">
            @role(["super_admin", "admin"])
                <a href="{{ route("project_category.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                    Add Project Category</a>
            @endrole
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Name</th>
                        <th>Description</th>

                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($project_categorys as $project_category)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $project_category->name ?? "" }}</td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $project_category->description ?? "" }}</td>

                            <td>
                                <a href="{{ route("project_category.info", $project_category->id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fa-solid fa-circle-info"></i> Info</a>
                                @role(["super_admin", "admin"])
                                    <a href="{{ route("project_category.edit", $project_category->id) }}" class="btn btn-primary btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit</a>
                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#project_categoryDeleteModal_{{ $project_category->id }}"><i
                                            class="fa-solid fa-trash"></i>
                                        Delete</a>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination link -->
            {{ $project_categorys->links("pagination::bootstrap-4") }}
        </div>
    @endif
    @include("backend.pages.project_category.project_category_delete_confirmation_modal")
@endsection
