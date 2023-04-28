<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class National_license extends Model
{
    protected $table = 'national_license';

    public function national_license()
    {
        return $this->belongsTo('App\National_license');
    }
}
