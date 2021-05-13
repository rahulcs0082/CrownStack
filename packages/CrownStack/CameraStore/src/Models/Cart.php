<?php

namespace CrownStack\CameraStore\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{   
    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'cart';
    
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

    /**
     * To get relevant associated items with the cart instance.
     */
    public function items() {
        return $this->hasMany(CartItem::class);
    }
}