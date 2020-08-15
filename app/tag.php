<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = 'tag';
    public $timestamp = false;
    protected $primaryKey = 'idTag';
    protected $fillable = ['tag', 'descripcion'];
}
