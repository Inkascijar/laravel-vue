<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Color;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
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
            ->with('success', 'Товар успешно добавлен');
    }
}