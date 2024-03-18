<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    //
    public function details()
    {
        return $this->hasMany(PageContentTrans::class ,'page_content_id');
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

    public function images()
    {
        return $this->hasMany(PageContentGallery::class , 'page_id');
    }
}
