<!-- Modal -->
@foreach ($project_initiation_overviews as $key => $project_initiation_overview)
    <div class="modal fade" id="project_initiation_user_assign_task_Modal_{{ $project_initiation_overview->id }}" tabindex="-1" aria-labelledby="project_initiation_user_assign_task_ModalLabel"
        aria-hidden="true">
        <form action="{{ route("user_assign_task.store", $project_initiation_overview->id) }}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="project_initiation_user_assign_task_ModalLabel">Assign Task to {{ $project_initiation_overview->user->username }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <!--task name-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="task">Task:</label>
                                    <textarea placeholder="Write task" class="form-control" name="task" id="editor_2" cols="30" rows="10"></textarea>
                                    @if ($errors->has("task"))
                                        <p class="text-danger">{{ $errors->first("task") }}</p>
                                    @endif
                                </div>
                            </div>

                            <!--task deadline-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="deadline">Deadline:</label>
                                    <input type="date" class="form-control" id="deadline" name="deadline">
                                    @if ($errors->has("deadline"))
                                        <p class="text-danger">{{ $errors->first("deadline") }}</p>
                                    @endif
                                </div>
                            </div>

                            <!--document upload-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="document">Document:</label>
                                    <input type="file" class="form-control" id="document" name="document">
                                    @if ($errors->has("document"))
                                        <p class="text-danger">{{ $errors->first("document") }}</p>
                                    @endif
                                </div>
                            </div>
                            <!--task status-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Task Status:</label>
                                    <select class="form-control" name="status" id="status">
                                        <option selected disabled>--Select status--</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->status }}">{{ $status->status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Assign Task</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endforeach
