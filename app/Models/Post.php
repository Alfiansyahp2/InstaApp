<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'caption',
        'image_path',
    ];

    /**
     * Relasi: Post dimiliki oleh User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Post memiliki banyak Like
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Relasi: Post memiliki banyak Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function isLikedByAuth()
    {
        if (!Auth::check()) {
            return false;
        }

        return $this->likes()
            ->where('user_id', Auth::id())
            ->exists();
    }
}
