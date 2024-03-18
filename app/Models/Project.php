<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function details()
    {
        return $this->hasMany(ProjectTrans::class ,'project_id');
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

    public function delete()
    {
        @unlink(storage_path('uploads/projects/').$this->image);

        return parent::delete();
    }
}
