<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    //
    public function details()
    {
        return $this->hasMany(PackageTrans::class ,'package_id');
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

    public function orders()
    {
        return $this->hasMany(PackageOrder::class , 'package_id');
    }

    public function delete()
    {
        $this->orders()->delete();
        return parent::delete();
    }
}
