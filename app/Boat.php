<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    protected $table='boat';

    public function boat()
    {
        return $this->belongsTo('App\Boat');
    }
}
