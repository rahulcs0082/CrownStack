<?php

namespace CrownStack\CameraStore\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'product_id' => $this->product_id,
            'price'      => $this->price,
            'base_price' => $this->base_price,
            'total'      => $this->total,
            'base_total' => $this->base_total
        ];
    }   
}