<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fishermen extends Model
{
    protected $table ='fishermen';

    public function user()
    {
    return $this->belongsTo('App\User');
    }
}
