<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_new_log extends Model
{
    protected $fillable = [
        'secuencial',
        'codigo',
        'bodega',
        'cantidad',
    ];
    public $timestamps = true;
}
