<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = "categoria";
    protected $primaryKey = 'idCategoria'; //debemos de especificar explicitamente el nombre del PK para que no nos de error
}
