<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'admin_id', 'category_id', 'title', 'content', 'thumb_img_path', 'views', 'status'
    ];

    protected $hidden = [
        'pivot'
    ];

    protected $dates = [
        'publication_date', 'created_at', 'updated_at', 'deleted_at'
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
		return $this->belongsToMany('App\Models\Tag', 'tag_post')->withTimestamps();;
	}
}
