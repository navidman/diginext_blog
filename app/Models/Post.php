<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $hidden = ['id'];

    protected $fillable = [
        'title',
        'content',
        'user_username',
    ];

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable')->select(['commentable_id', 'commentable_type', 'user_username', 'text']);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_username');
    }
}
