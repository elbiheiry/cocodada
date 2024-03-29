<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = ['order' ,'image' , 'slug'];
    public function details()
    {
        return $this->hasMany(ServiceTrans::class ,'service_id');
    }

    public function arabic()
    {
        return $this->details()->where('lang' , 'ar')->first();
    }

    public function english()
    {
        return $this->details()->where('lang' , 'en')->first();
    }

    public function translated(){
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }

    public function images()
    {
        return $this->hasMany(ServiceGallery::class ,'service_id');
    }

    public function types()
    {
        return $this->hasMany(ServiceType::class,'service_id');
    }

    public function videos()
    {
        return $this->hasMany(ServiceVideo::class , 'service_id');
    }

    public function audios()
    {
        return $this->hasMany(ServiceAudio::class , 'service_id');
    }

    public function delete()
    {
        foreach ($this->images() as $image) {
            @unlink(storage_path('uploads/services/').$image->image);
        }
        foreach ($this->types() as $type) {
            @unlink(storage_path('uploads/services/').$type->image);
        }

        foreach ($this->audios() as $audio){
            @unlink(storage_path('uploads/services/').$audio->audio);
        }

        $this->videos()->delete();
        $this->audios()->delete();

        @unlink(storage_path('uploads/services/') .$this->image);

        return parent::delete(); // TODO: Change the autogenerated stub
    }
}
