@extends('user.layout.app')

@section('content')

<div class="container text-white">

    {{-- Profile Header --}}
    <div class="d-flex align-items-center mb-4">
        {{-- Avatar --}}
        <div class="me-4">
            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center"
                 style="width:120px;height:120px;font-size:36px;">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
        </div>

        {{-- Info --}}
        <div>
            <h4 class="mb-2">{{ $user->name }}</h4>

            <div class="d-flex gap-4 mb-2">
                <span><strong>{{ $posts->count() }}</strong> posts</span>
                <span><strong>0</strong> followers</span>
                <span><strong>0</strong> following</span>
            </div>

            <button class="btn btn-secondary btn-sm">Edit profile</button>
        </div>
    </div>

    <hr class="border-secondary">

    {{-- Tabs --}}
    <div class="d-flex justify-content-center gap-5 mb-3 text-uppercase small">
        <span class="fw-bold border-bottom pb-2">Posts</span>
        <span class="text-muted">Saved</span>
        <span class="text-muted">Tagged</span>
    </div>

    {{-- Post Grid --}}
    <div class="row g-1">
        @forelse ($posts as $post)
            <div class="col-4">
                <div class="ratio ratio-1x1">
                    <img src="{{ asset('storage/'.$post->image_path) }}"
                         class="img-fluid object-fit-cover">
                </div>
            </div>
        @empty
            <p class="text-center text-muted mt-4">
                Belum ada postingan
            </p>
        @endforelse
    </div>

</div>

@endsection
