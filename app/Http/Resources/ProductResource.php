<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'brand' => $this->brand,
            'category_id' => $this->category->name,
            'unit_id' => $this->unit->name,
            'tag_id' => $this->tag->name,
            'updated'=> $this->updated_at->format('d-m-y'),
            'created' => $this->created_at->format('d-m-y'),
        ];
    }
}
