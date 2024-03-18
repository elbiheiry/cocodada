<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function details()
    {
        return $this->hasMany(CategoryTrans::class ,'category_id');
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

    public function projects()
    {
        return $this->hasMany(Project::class,'category_id');
    }

    public function delete()
    {
        foreach ($this->projects() as $project) {
            @unlink(storage_path('uploads/projects/').$project->image);
        }
        @unlink(storage_path('uploads/categories/').$this->image);

        return parent::delete();
    }
}
