<nav class="navbar navbar-light bg-white shadow-sm mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="navbar-brand fw-bold">📸 InstaApp</span>

        <div>
            @auth
                <span class="me-3">{{ auth()->user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Register</a>
            @endauth
        </div>
    </div>
</nav>
