<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\StoreRequest;

class CreateController extends Controller
{
    public function create()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        return view('product.create', compact('tags', 'colors', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        
        // Обработка изображения
        if ($request->hasFile('preview_image')) {
            $file = $request->file('preview_image');
            $filename = 'product_'.time().'.'.$file->extension();
            $path = $file->storeAs('images', $filename, 'public');
            $data['preview_image'] = $path;
        }

        // Создаем продукт
        $product = Product::create($data);

        // Привязываем теги и цвета
        $product->tags()->sync($request->input('tags', []));
        $product->colors()->sync($request->input('colors', []));

        return redirect()
            ->route('product.index')
            ->with('success', 'Продукт успешно создан');
    }
}