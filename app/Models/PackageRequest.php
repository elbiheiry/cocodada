<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageRequest extends Model
{
    public function getAvatar()
    {
        $hash = md5(strtolower(trim($this->email)));
        $image = 'http://www.gravatar.com/avatar/' . $hash;

        return $image;
    }

    public function answer()
    {
        return $this->hasOne('App\Answer', 'request_id');
    }
}
