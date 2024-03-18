<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function details()
    {
        return $this->hasMany(ArticleTrans::class ,'article_id');
    }

    public function arabic()
    {
        return $this->details()->where('lang' , 'ar')->first();
    }

    public function english()
    {
        return $this->details()->where('lang' , 'en')->first();
    }

    public function translated()
    {
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }
}
