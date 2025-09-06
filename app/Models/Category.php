<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_uz','name_ru','meta_title','meta_description','meta_keyword','slug'];

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
