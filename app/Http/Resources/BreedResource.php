<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BreedResource extends JsonResource
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
            'originCity' => $this->resource->originCity,
            'characteristics' => $this->resource->characteristics,
        ];
    }

    public static $wrap = 'breed';
}
