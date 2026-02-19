<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|image',
            'price' => 'required|numeric',
            'count' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'colors' => 'nullable|array',
            'colors.*' => 'exists:colors,id',
        ];
    }
}
