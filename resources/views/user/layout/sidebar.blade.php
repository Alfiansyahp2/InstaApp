<div class="sidebar d-flex flex-column p-3">

    <h4 class="mb-4 fw-bold">InstaApp</h4>

    {{-- Menu atas --}}
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

    {{-- Logout --}}
    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
    @csrf
    <button type="submit" class="nav-link text-danger w-100 text-start">
        <i class="bi bi-box-arrow-right fs-5"></i> Logout
    </button>
</form>



</div>
