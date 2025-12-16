@extends('user.layout.app')

@section('content')

{{-- ================= CREATE POST ================= --}}
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    <textarea name="caption"
        class="form-control bg-dark text-white border-0 mb-2"
        placeholder="What's on your mind?"></textarea>

    <input type="file" name="image" class="form-control bg-dark text-white border-0 mb-2">

    <button type="submit" class="btn btn-primary w-100">Post</button>

</form>

{{-- ================= FEED ================= --}}
@foreach ($posts as $post)
<div class="post mb-4">

    {{-- HEADER --}}
    <div class="d-flex align-items-center mb-2">

        <div class="avatar me-2">
            {{ strtoupper(substr($post->user->name, 0, 2)) }}
        </div>

        <strong>{{ $post->user->name }}</strong>

        <small class="text-white ms-2">
            {{ $post->created_at->diffForHumans() }}
        </small>

        <div class="ms-auto d-flex gap-3">
            @can('update', $post)
    <button
        type="button"
        class="btn p-0 text-warning"
        data-bs-toggle="modal"
        data-bs-target="#editPostModal{{ $post->id }}">
        <i class="bi bi-pencil-square fs-5"></i>
    </button>
@endcan

            @can('delete', $post)
    <button
        type="button"
        class="btn p-0 text-danger"
        data-bs-toggle="modal"
        data-bs-target="#deleteModal{{ $post->id }}">
        <i class="bi bi-trash fs-5"></i>
    </button>
@endcan

        </div>
    </div>

    {{-- IMAGE --}}
    @if ($post->image_path)
        <img src="{{ asset('storage/'.$post->image_path) }}"
             class="img-fluid rounded mb-2"
             style="cursor:pointer"
             data-bs-toggle="modal"
             data-bs-target="#postModal{{ $post->id }}">
    @endif

    {{-- ACTION --}}
    <div class="d-flex gap-3 mb-1 align-items-center">

        <form action="{{ route('posts.like', $post->id) }}" method="POST">
            @csrf
            <button class="btn btn-link p-0">
                <i class="bi bi-heart fs-5 
                    {{ $post->isLikedByAuth() ? 'text-danger' : 'text-white' }}">
                </i>
            </button>
        </form>

        <i class="bi bi-chat fs-5"
           role="button"
           data-bs-toggle="modal"
           data-bs-target="#postModal{{ $post->id }}">
        </i>

    </div>

    <small class="text-white">{{ $post->likes->count() }} likes</small>

    {{-- CAPTION --}}
    <p class="mt-1">
        <strong>{{ $post->user->name }}</strong>
        {{ $post->caption }}
    </p>

</div>

{{-- 🔥 INCLUDE MODAL --}}
@include('user.modal.modal', ['post' => $post])
@include('user.modal.modal-edit', ['post' => $post])
@include('user.modal.modal-delete', ['post' => $post])

@endforeach

@endsection
