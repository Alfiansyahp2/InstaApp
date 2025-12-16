<div class="modal fade" id="postModal{{ $post->id }}" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-0">

            <div class="modal-body p-0">
                <div class="row g-0">

                    {{-- LEFT IMAGE --}}
                    <div class="col-md-7 bg-black d-flex align-items-center justify-content-center">
                        <img src="{{ asset('storage/'.$post->image_path) }}"
                             class="img-fluid"
                             style="max-height: 90vh">
                    </div>

                    {{-- RIGHT CONTENT --}}
                    <div class="col-md-5 d-flex flex-column">

                        {{-- HEADER --}}
                        <div class="d-flex align-items-center justify-content-between p-3 border-bottom border-secondary">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar">
                                    {{ strtoupper(substr($post->user->name, 0, 2)) }}
                                </div>
                                <strong>{{ $post->user->name }}</strong>
                            </div>

                            <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>

                        {{-- CAPTION --}}
                        <div class="p-3 border-bottom border-secondary">
                            <strong>{{ $post->user->name }}</strong>
                            {{ $post->caption }}

                            <div class="text-secondary small mt-1">
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>

                        {{-- COMMENTS --}}
                        <div class="flex-grow-1 p-3 overflow-auto">
                            @forelse ($post->comments as $comment)
                                <div class="mb-3">
                                    <strong>{{ $comment->user->name }}</strong>
                                    {{ $comment->comment }}

                                    <div class="text-secondary small">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-secondary">No comments yet</p>
                            @endforelse
                        </div>

                        {{-- COMMENT INPUT --}}
                        <div class="border-top border-secondary p-3">
                            <form action="{{ route('posts.comment', $post->id) }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="text"
                                           name="comment"
                                           class="form-control bg-dark text-white border-secondary"
                                           placeholder="Add a comment...">
                                    <button class="btn btn-primary">Post</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
