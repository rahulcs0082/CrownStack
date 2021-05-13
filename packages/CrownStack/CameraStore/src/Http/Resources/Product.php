<?php

namespace CrownStack\CameraStore\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'category'    => $this->category,
            'description' => $this->description,
            'price'       => $this->price,
            'make'        => $this->make,
        ];
    }   
}