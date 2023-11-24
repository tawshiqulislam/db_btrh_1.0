@foreach ($vendors as $vendor)
    <!-- Modal -->
    <div class="modal fade" id="vendorDeleteModal_{{ $vendor->id }}" tabindex="-1" aria-labelledby="vendorDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorDeleteModalLabel_{{ $vendor->id }}">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this vendor?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route("vendor.delete", $vendor->id) }}" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
