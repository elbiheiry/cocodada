<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAudio extends Model
{
    //
    protected $table = 'service_audios';
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
