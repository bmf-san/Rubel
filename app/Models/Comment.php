<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'article_id', 'comment'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }}
