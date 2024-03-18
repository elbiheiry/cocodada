<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    public function details()
    {
        return $this->hasMany(TeamTrans::class ,'team_id');
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

    public function social_links()
    {
        return $this->hasMany(TeamLink::class ,'team_id');
    }

    public function delete()
    {
        $this->details()->delete();
        $this->social_links()->delete();
        @unlink(storage_path('uploads/team/') .$this->image);
        return parent::delete(); // TODO: Change the autogenerated stub
    }
}
