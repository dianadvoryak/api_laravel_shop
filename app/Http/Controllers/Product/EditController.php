<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $colorProducts = ColorProduct::all();
        $productTags = ProductTag::all();
        return view('product.edit', compact('product', 'tags', 'colors', 'categories', 'colorProducts', 'productTags'));
    }
}
