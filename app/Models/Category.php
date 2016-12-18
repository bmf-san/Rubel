<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function post()
    {
        return $this->hasOne('App\Models\Post');
    }
}
