<?php

namespace CrownStack\CameraStore\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cart extends JsonResource
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
            'id'             => $this->id,
            'items_qty'      => $this->items_qty,
            'sub_total'      => $this->sub_total,
            'base_sub_total' => $this->base_sub_total,
            'customer_id'    => $this->customer_id,
            'items'          => CartItem::collection($this->items),
        ];
    }   
}