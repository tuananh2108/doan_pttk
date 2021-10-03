<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table='roles';
    // const ADMIN_ROLE = ADMIN;
    // const GUEST_ROLE = GUEST;
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
