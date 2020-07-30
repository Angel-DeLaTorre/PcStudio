<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = "proveedor";
    protected $primaryKey = 'idProveedor'; //debemos de especificar explicitamente el nombre del PK para que no nos de error
}
