<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTrans extends Model
{
    //
    protected $fillable = ['title' ,'description' , 'blog_id' ,'lang', 'meta_title', 'meta_description', 'meta_keywords'];
}
