<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asdi extends Model
{
    protected $table ='asdi';

// models get

public function user()
    {
        return $this->belongsTo('App\User');
    }

public function boat()
    {
        return $this->belongsTo('App\Boat');
    }

public function national_license()
    {
        return $this->belongsTo('App\National_license');
    }
}
