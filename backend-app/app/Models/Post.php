<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'admin_id', 'category_id', 'title', 'md_content', 'html_content', 'views', 'publication_status', 'publication_date'
    ];

    protected $hidden = [
        'pivot',
    ];

    protected $dates = [
        'publication_date', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post')->withTimestamps();
    }
}
