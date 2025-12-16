<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-secondary">

            <div class="modal-header border-secondary">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle text-warning me-2"></i>
                    Confirm Logout
                </h5>
                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body text-center">
                <p class="mb-1">Are you sure you want to log out?</p>
                <small class="text-secondary">
                    You will need to log in again to access your account.
                </small>
            </div>

            <div class="modal-footer border-secondary">
                <button type="button"
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        Yes, Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
