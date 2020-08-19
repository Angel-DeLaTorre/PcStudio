<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    
    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->hasOne('App\User', 'idRol');
    }
}
