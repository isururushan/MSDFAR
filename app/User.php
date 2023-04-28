<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        const FISHERMEN_TYPE ='fishermen';
        const DIRECTOR_TYPE  ='director';
        const ASDI_TYPE      ='asdi';
        const DOFFICER_TYPE  ='dofficer';

        public function isFishermen()    {
            return $this->role === self::FISHERMEN_TYPE;
        }
        public function isDirector()    {
            return $this->role === self::DIRECTOR_TYPE;
        }
        public function isAsdi()    {
            return $this->role === self::ASDI_TYPE;
        }
        public function isDofficer()    {
            return $this->role === self::DOFFICER_TYPE;
        }

    protected $fillable = [
        'first_name','last_name', 'email', 'password','role'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
