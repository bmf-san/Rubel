<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
        'post_id', 'img_path'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }}
