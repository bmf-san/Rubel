<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'pivot',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'tag_post');
    }
}
