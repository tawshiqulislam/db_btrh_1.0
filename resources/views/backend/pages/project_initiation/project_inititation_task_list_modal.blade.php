<div class="modal fade" id="project_initiation_task_list_ModalToggle" aria-hidden="true" aria-labelledby="project_initiation_task_list_ModalToggleLabel" tabindex="-1">
    <div class="modal-dialog  modal-xl">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="project_initiation_task_list_ModalToggleLabel">Task List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Username</th>
                            <th>Task</th>
                            <th>Status</th>
                            <th>isApproved</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $task->assigned_to_user->username }}</td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $task->task }}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->isApproved ? "Yes" : "No" }}</td>
                                <td>
                                    <a type="button" data-bs-target="#project_initiation_task_list_ModalToggle_{{ $task->id }}" data-bs-toggle="modal" data-bs-dismiss="modal"
                                        class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-eye"></i>
                                        View Task</a>
                                    @if ($task->isApproved == false && $task->status == "completed")
                                        <a onclick="return confirm('Are you sure?')" href={{ route("task_approved.update", $task->id) }} class="btn btn-warning btn-sm text-white"><i
                                                class="fa-solid fa-circle-check"></i>
                                            Approve Task</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach ($tasks as $task)
    <div class="modal fade" id="project_initiation_task_list_ModalToggle_{{ $task->id }}" aria-hidden="true" aria-labelledby="project_initiation_task_list_ModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_initiation_task_list_ModalToggleLabel2">{{ $task->project_initiation->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ $task->task }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm" data-bs-target="#project_initiation_task_list_ModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal"><i
                            class="fa-solid fa-backward"></i>
                        Back to task list</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
