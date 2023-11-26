<!-- Modal -->
<div class="modal fade" id="disburseProjectPaymentModal" tabindex="-1" aria-labelledby="disburseProjectPaymentModalLabel" aria-hidden="true">
    <form action="{{ route("send_for_disbursing_payment.store", $project_submission->id) }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="disburseProjectPaymentModalLabel">Disbursing Payment <br>{{ $project_submission->project_initiation->name }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="" cols="30" rows="10" placeholder="Write description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>
