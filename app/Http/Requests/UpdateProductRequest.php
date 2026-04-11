<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'product_quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
