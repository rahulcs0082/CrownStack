<?php

namespace CrownStack\CameraStore\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{   
    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'cart_items';
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}