<table class="table table-bordered">
    <thead>
        <tr>
            <th>SL No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Deadline</th>
            <th>Verified By</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($project_initiations as $key => $project_initiation)
            <tr>
                <td>{{ ++$key }}</td>
                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $project_initiation->name ?? "" }}</td>
                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $project_initiation->project_category->name ?? "" }}</td>
                <td>{{ $project_initiation->deadline ?? "" }}</td>
                <td>{{ $project_initiation->verified_by ?? "Not Verified" }}</td>
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
