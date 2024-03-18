<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function delete()
    {
        @unlink(storage_path('uploads/answers/').$this->image);
        
        return parent::delete();
    }
}
