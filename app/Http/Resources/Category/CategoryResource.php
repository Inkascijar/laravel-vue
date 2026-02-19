<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable\JsonSerializable
     */

    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            
        ];
    }
}
