@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1 class="mb-2">Project Initiation</h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_initiation.index") }}">Project Initiation</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main container -->

    <!-- if there are no data in project initiations table -->
    @if ($project_initiations->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no project initiation added yet.</h4>
            <a href="{{ route("project_initiation.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Project Initiation</a>
        </div>

        <!-- if the data are present in project initiations table -->
    @else
        <div class="container table_create">
            <a href="{{ route("project_initiation.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Project Initiation</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project_initiations as $project_initiation)
                        <tr>
                            <td>{{ ++$sl }}</td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $project_initiation->name ?? "" }}</td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $project_initiation->project_category->name ?? "" }}</td>
                            <td>{{ $project_initiation->deadline ?? "" }}</td>
                            <td>
                                <a href="{{ route("project_initiation.info", $project_initiation->id) }}"
                                    class="btn btn-info btn-sm text-white">
                                    <i class="fa-solid fa-circle-info"></i> Info</a>
                                <a href="{{ route("project_initiation.edit", $project_initiation->id) }}"
                                    class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-file-pen"></i> Edit</a>
                                <a href="{{ route("project_initiation.delete", $project_initiation->id) }}"
                                    class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination link -->
            {{ $project_initiations->links("pagination::bootstrap-4") }}
        </div>
    @endif

@endsection
