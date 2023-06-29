<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['commentable_id', 'commentable_type'];

    public function commentable() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_username');
    }

    public function child() {
        return $this->hasMany(Comment::class , 'parent_id' , 'id');
    }
}
