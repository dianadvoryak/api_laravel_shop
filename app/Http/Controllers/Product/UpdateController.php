<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $tagsIds = $data['tags'] ?? null;
        $colorsIds = $data['colors'] ?? null;
        unset($data['tags'], $data['colors']);

        $product = Product::firstOrCreate([
            'title' => $data['title'],
        ], $data);

        if (isset($tagsIds)) {
            foreach ($tagsIds as $tagsId) {
                ProductTag::firstOrCreate([
                    'product_id' => $product->id,
                    'tag_id' => $tagsId
                ]);
            }
        }

        if (isset($colorsIds)) {
            foreach ($colorsIds as $colorId) {
                ColorProduct::firstOrCreate([
                    'product_id' => $product->id,
                    'color_id' => $colorId
                ]);
            }
        }

        return view('product.show', compact('product'));
    }
}
