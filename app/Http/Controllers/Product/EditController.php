<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Color;

class EditController extends Controller
{
    public function edit(Product $product)
    {
        // Явная загрузка всех необходимых отношений
        $product->load([
            'category', // Добавляем загрузку категории
            'tags' => function($query) {
                $query->select('id', 'title');
            },
            'colors' => function($query) {
                $query->select('id', 'title');
            }
        ]);

        // Получаем все возможные варианты для выбора
        $categories = Category::select('id', 'title')->get();
        $tags = Tag::select('id', 'title')->get();
        $colors = Color::select('id', 'title')->get();

        return view('product.edit', compact('product', 'categories', 'tags', 'colors'));
    }
}