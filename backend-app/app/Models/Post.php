<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'admin_id', 'category_id', 'title', 'content', 'thumb_img_path', 'views', 'publication_status', 'publication_date'
    ];

    protected $hidden = [
        'pivot',
    ];

    protected $dates = [
        'publication_date', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_post')->withTimestamps();
    }
}
