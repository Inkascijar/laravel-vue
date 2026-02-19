<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Color;

class ShowController extends Controller
{
    public function show(product $product)
    {
        $product->load(['category', 'tags', 'colors']);
    return view('product.show', compact('product'));
    }
}
