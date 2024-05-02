<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DeleteController extends Controller
{
    public function __invoke(Product $tag)
    {
        $tag->delete();

        return redirect()->route('product.index');
    }
}
