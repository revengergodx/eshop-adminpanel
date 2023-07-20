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
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'is_published' => $this->is_published,
            'price' => $this->price,
            'count' => $this->count,
            'image_url' => $this->imageUrl,
            'colors' => ColorResource::collection($this->colors),
            'tags' => TagResource::collection($this->tags),
            'sizes' => SizeResource::collection($this->sizes),
            'category' => new CategoryResource($this->categories),
            'is_new' => $this->is_new,
            'old_price' => $this->old_price,
            'discount' => $this->discount,
        ];
    }
}
