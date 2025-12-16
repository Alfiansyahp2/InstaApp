@extends('user.layout.app')
@section('content')
<body class="bg-light">

<nav class="navbar navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <span class="navbar-brand fw-bold">📸 InstaApp</span>
        <span>{{ auth()->user()->name ?? 'Guest' }}</span>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>

@endsection
