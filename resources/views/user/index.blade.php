@extends('user.layout.app')

@section('content')

{{-- Create Post --}}
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    <textarea name="caption"
          class="form-control bg-dark text-white border-0 mb-2"
          placeholder="What's on your mind?"></textarea>

    <input type="file" name="image" class="form-control bg-dark text-white border-0 mb-2">
    <button class="btn btn-primary w-100">Post</button>
</form>

{{-- Feed --}}
@foreach ($posts as $post)
<div class="post">

    {{-- Header --}}
    <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
            {{ strtoupper(substr($post->user->name, 0, 2)) }}
        </div>
        <strong>{{ $post->user->name }}</strong>
        <small class="text-white ms-auto">
    {{ $post->created_at->diffForHumans() }}
</small>

    </div>

    {{-- Image --}}
    @if ($post->image_path)
        <img src="{{ asset('storage/'.$post->image_path) }}"
             class="img-fluid rounded mb-2">
    @endif

    {{-- Action --}}
    <div class="d-flex gap-3 mb-1 align-items-center">
    <form action="{{ route('posts.like', $post->id) }}" method="POST">
        @csrf
        <button class="btn btn-link p-0">
            <i class="bi bi-heart fs-5 
               {{ $post->isLikedByAuth() ? 'text-danger' : 'text-white' }}">
            </i>
        </button>
    </form>

    <i class="bi bi-chat fs-5"></i>
    <i class="bi bi-send fs-5"></i>
</div>

    <small class="text-white"> {{ $post->likes->count() }} likes </small>


    {{-- Caption --}}
    <p class="mt-1">
        <strong>{{ $post->user->name }}</strong> {{ $post->caption }}
    </p>

    {{-- Comments --}}
    @foreach ($post->comments->take(2) as $comment)
        <p class="mb-1">
            <strong>{{ $comment->user->name }}</strong>
            {{ $comment->comment }}
        </p>
    @endforeach

    @if ($post->comments->count() > 2)
        <small class="text-white">View all comments</small>
    @endif

    {{-- Comment Input --}}
    <form action="{{ route('posts.comment', $post->id) }}" method="POST">
        @csrf
        <input type="text" name="comment"
               class="form-control bg-dark text-white border-0 mt-2"
               placeholder="Add a comment...">
    </form>

</div>
@endforeach

@endsection
