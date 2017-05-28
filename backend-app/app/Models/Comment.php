<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'comment'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
