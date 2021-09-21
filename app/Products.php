<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable= [
            'secuencial',
            'codigo',
            'bodega',
            'cantidad'
        ];
    public $timestamps = true;
}
