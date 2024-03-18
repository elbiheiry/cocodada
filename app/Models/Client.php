<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function delete()
    {
        @unlink(storage_path('uploads/clients/').$this->image);
        return parent::delete(); // TODO: Change the autogenerated stub
    }
}
