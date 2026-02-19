<?php

namespace App\Http\Controllers\API\Product;
use App\Http\Resources\Product\ProductResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class IndexController extends Controller
{
    public function __invoke()
    {

        $products=Product::all();
        return ProductResource::collection($products);
    }
}
