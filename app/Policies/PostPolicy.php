<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * User boleh edit post miliknya sendiri
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * User boleh delete post miliknya sendiri
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
