<div class="sidebar d-flex flex-column p-3">

    <h4 class="mb-4 fw-bold">InstaApp</h4>

    {{-- Top Menu --}}
    <div class="nav flex-column gap-2">
        <a href="{{ route('posts.index') }}"
           class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">
            <i class="bi bi-house-door fs-5"></i> Home
        </a>

        <a href="{{ route('profile.index') }}"
           class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <i class="bi bi-person-circle fs-5"></i> Profile
        </a>
    </div>

    {{-- Logout Button --}}
    <button
        class="nav-link text-danger w-100 text-start mt-auto"
        data-bs-toggle="modal"
        data-bs-target="#logoutModal">
        <i class="bi bi-box-arrow-right fs-5"></i> Logout
    </button>

</div>

{{-- Include Logout Modal --}}
@include('user.modal.modal-logout')
