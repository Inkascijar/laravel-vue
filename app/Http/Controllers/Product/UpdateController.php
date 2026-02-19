<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function update(UpdateRequest $request, Product $product)
    {
        // Валидация данных
        $data = $request->validated();
        
        // Обновление изображения
        if ($request->hasFile('preview_image')) {
            // Удаление старого изображения
            if ($product->preview_image) {
                Storage::disk('public')->delete($product->preview_image);
            }
            $data['preview_image'] = $request->file('preview_image')->store('uploads', 'public');
        }
        
        // Обновление продукта
        $product->update($data);
        
        // Синхронизация тегов (с проверкой на null)
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->detach();
        }
        
        // Синхронизация цветов (с проверкой на null)
        if ($request->has('colors')) {
            $product->colors()->sync($request->colors);
        } else {
            $product->colors()->detach();
        }
        
        return redirect()->route('product.index')->with('success', 'Продукт успешно обновлен');
    }
}