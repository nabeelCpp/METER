<!-- Global Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ __('admin.Confirm Deletion') }}</h5>
                {{-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <p id="deleteModalMessage">
                    {{ __('admin.Are you sure you want to delete this record? This action cannot be undone.') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('admin.Cancel') }}</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('admin.Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        function confirmDelete(deleteUrl, message) {
            let modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            let deleteForm = document.getElementById('deleteForm');
            let deleteModalMessage = document.getElementById('deleteModalMessage');

            deleteModalMessage.innerText = message; // Set the dynamic message
            deleteForm.setAttribute('action', deleteUrl); // Set the form action

            modal.show(); // Show the modal
        }
    </script>
@endpush
