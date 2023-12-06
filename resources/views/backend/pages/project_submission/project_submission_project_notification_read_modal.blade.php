<!-- Modal -->
@foreach ($project_submission->project_notifications as $key => $project_notification)
    <div class="modal fade" id="project_submission_project_notification_read_Modal_{{ $project_notification->id }}" tabindex="-1" aria-labelledby="project_submission_project_notification_read_ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project_submission_project_notification_read_ModalLabel">{{ $project_notification->subject }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="message"><strong>Message:</strong></label>
                            <p>{{ $project_notification->message ?? "" }}</p>
                        </div>
                        @if ($project_notification->document)
                            <div class="col-md-12">
                                <label for="document">Document:</label>
                                <a href="{{ asset("storage/project_notification/" . $project_notification->document) }}">{{ $project_notification->document }}</a>
                            </div>
                        @endif
                        @if ($project_notification->date)
                            <div class="col-md-12">
                                <p><strong>Date:</strong> {{ $project_notification->date ?? "" }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
        </form>
    </div>
@endforeach
