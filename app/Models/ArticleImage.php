<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $fillable = [
        'article_id', 'img_path'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }}
