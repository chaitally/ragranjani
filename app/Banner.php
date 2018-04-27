<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title', 'caption', 'content', 'slide_img_path', 'slug',
    ];
}
