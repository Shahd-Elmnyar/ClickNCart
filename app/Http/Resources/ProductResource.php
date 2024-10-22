<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name_en' => $this->name['en'],
            'name_ar' => $this->name['ar'],
            'content_en' => $this->content['en'],
            'content_ar' => $this->content['ar'],
            'img' => $this->img,
            'price' => $this->price,
            'offer_price' => $this->offer_price,
            'discount_type' => $this->discount_type,
            'discount' => $this->discount,
            'active' => $this->active,
            'featured' => $this->featured,
            'category_id' =>  new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
