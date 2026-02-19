<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['image_url'];
    protected $table='products';
    protected $fillable = [
        'title',
        'description',  // обязательно, иначе не сохранится
        'content',
        'preview_image',
        'price',
        'count',
        'is_published',
        'category_id',
    ];
    // app/Models/Product.php
    
    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'product_tags')
            ->withPivot('product_id', 'tag_id')
            ->select('tags.id', 'tags.title'); // Явно указываем столбцы
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_products')
            ->withPivot('color_id', 'product_id')
            ->select('colors.id', 'colors.title');
    }

    // app/Models/Product.php
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageUrlAttribute()
{
    if (!$this->preview_image) {
        return asset('images/default-product.jpg');
    }
    return asset('storage/'.$this->preview_image);
}
}
 