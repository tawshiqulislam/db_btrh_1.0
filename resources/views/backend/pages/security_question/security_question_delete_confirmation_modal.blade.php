@foreach ($security_questions as $security_question)
    <!-- Modal -->
    <div class="modal fade" id="security_questionDeleteModal_{{ $security_question->id }}" tabindex="-1" aria-labelledby="security_questionDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="security_questionDeleteModalLabel_{{ $security_question->id }}">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this security question?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route("security_question.delete", $security_question->id) }}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
