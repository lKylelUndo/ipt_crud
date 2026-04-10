<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Product extends Model
{
    protected $fillable = [ "product_name", "product_price", "product_quantity", "category_id" ];

    public static function validate($data)
    {
        return Validator::make($data, [
            "product_name" => "required|string",
            "product_price" => "required|numeric",
            "product_quantity" => "required|integer",
        ]);
    }
}
