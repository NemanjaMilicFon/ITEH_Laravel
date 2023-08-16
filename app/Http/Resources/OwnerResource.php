<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            'birth_year' => $this->resource->birth_year,
            'is_male' => $this->resource->is_male,
            'nationality' => $this->resource->nationality,
            'height' => $this->resource->height
        ];
    }

    public static $wrap = 'owner';
}
