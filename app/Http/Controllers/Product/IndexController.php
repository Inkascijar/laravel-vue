<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Color;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'tags', 'colors'])->paginate(10);
    return view('product.index', compact('products'));
    }
}
