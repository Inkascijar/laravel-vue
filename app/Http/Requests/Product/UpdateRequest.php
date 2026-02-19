<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string',
            'description'=>'required',
            'content'=>'required',
            'preview_image'=>'required',
            'price'=>'required',
            'count'=>'required',
            'category_id'=>'nullable',
            'tags'=>'nullable|array',
            'colors'=>'nullable|array',

        ];
    }
}
