<?php

namespace CrownStack\CameraStore\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'make'
    ];
}