<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $hidden = ['id'];
    protected $fillable = [
        'title',
        'url',
        'user_username',
    ];

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable')->select(['commentable_id', 'commentable_type', 'user_username', 'text']);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_username');
    }
}
