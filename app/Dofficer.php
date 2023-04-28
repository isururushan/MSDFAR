<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dofficer extends Model
{
    protected $table ='dofficer';

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
