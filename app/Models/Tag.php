<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'pivot'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article', 'tag_article');
    }}
