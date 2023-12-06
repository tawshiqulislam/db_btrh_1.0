<!-- Modal -->
<div class="modal fade" id="makeInvoiceModal" tabindex="-1" aria-labelledby="makeInvoiceModalLabel" aria-hidden="true">
    <form action="{{ route("invoice.store", $disburse_project_payment->id) }}" method='POST'>
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="makeInvoiceModalLabel">Make Invoice <br>
                        {{ $disburse_project_payment->project_initiation->name }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="amount">Amount</label>
                            <input type="number" placeholder="Enter amount" name="amount" id="amount" step="any" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Make Invoice</button>
                </div>
            </div>
        </div>
    </form>
</div>
