<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Color\ColorResourse;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $products = Product::where('group_id', $this->group_id)->get();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'image_url' => $this->imageUrl,
            'price' => $this->price,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new ColorResourse($this->category),
            'product_images' => ProductImageResource::collection($this->productImages),
            'group_products' => ProductMinResourse::collection($products),
        ];
    }
}
