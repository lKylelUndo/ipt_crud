<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Product extends Model
{
    protected $fillable = [ "product_name", "product_price", "product_quantity", "category_id" ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function validate($data)
    {
        return Validator::make($data, [
            "product_name" => "required|string|max:255",
            "product_price" => "required|numeric|min:0",
            "product_quantity" => "required|integer|min:0",
            "category_id" => "required|exists:categories,id",
        ]);
    }
}
