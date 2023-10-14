@extends("backend.layouts.master")
@section("content")

    <div class="pagetitle">
        <h1>Department</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("department.index") }}">Department</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($departments->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no department added yet.</h4>
            <a href="{{ route("department.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Department</a>

        </div>
    @else
        <div class="container">
            <a href="{{ route("department.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Department</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Department</th>
                        <th>Username</th>
                        <th>Designation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $department->name ?? "" }}</td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $department->user->username ?? "" }}
                            </td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $department->designation }}
                            </td>

                            <td>
                                <a href="{{ route("department.info", $department->id) }}"
                                    class="btn btn-info btn-sm text-white">
                                    <i class="fa-solid fa-circle-info"></i> Info</a>
                                <a href="{{ route("department.edit", $department->id) }}"
                                    class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-file-pen"></i> Edit</a>
                                <a href="{{ route("department.delete", $department->id) }}"
                                    class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $departments->links("pagination::bootstrap-4") }}
        </div>
    @endif

@endsection
