@extends("backend.layouts.master")
@section("content")

    <div class="pagetitle">
        <h1>Monitoring Team</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("monitoring_team.index") }}">Monitoring Team</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    @if ($monitoring_teams->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no monitoring team added yet.</h4>
            @role(["super_admin", "admin"])
                <a href="{{ route("monitoring_team.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                    Add Monitoring Team</a>
            @endrole

        </div>
    @else
        <div class="container">
            @role(["super_admin", "admin"])
                <a href="{{ route("monitoring_team.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-plus"></i>
                    Add Monitoring Team</a>
            @endrole
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Project Name</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monitoring_teams as $monitoring_team)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $monitoring_team->project_initiation->name ?? "" }}
                            </td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $monitoring_team->user->username ?? "" }}
                            </td>

                            @role(["super_admin", "admin"])
                                <td>
                                    <a href="{{ route("monitoring_team.edit", $monitoring_team->id) }}" class="btn btn-primary btn-sm text-white">
                                        <i class="fa-solid fa-file-pen"></i> Edit</a>
                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#monitoring_teamDeleteModal_{{ $monitoring_team->id }}"><i
                                            class="fa-solid fa-trash"></i>
                                        Delete</a>
                                </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $monitoring_teams->links("pagination::bootstrap-4") }}
        </div>
    @endif
    @include("backend.pages.monitoring_team.monitoring_team_delete_confirmation_modal")
@endsection
