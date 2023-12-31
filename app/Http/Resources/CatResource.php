<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'color' => $this->resource->color,
            'price' => $this->resource->price,
            'age' => $this->resource->age,
            'breed' => $this->resource->breed,
            'owner' => new OwnerResource($this->resource->owner)
        ];
    }

    public static $wrap = 'cat';
}
