<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTrans extends Model
{
    //
    protected $fillable = ['name' ,'description' ,'features' ,'lang', 'meta_title', 'meta_description', 'meta_keywords'];
}
