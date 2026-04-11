<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Category extends Model
{
    protected $fillable = ['category_name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function validate($data) 
    {
        return Validator::make($data, [
            'category_name' => 'required|string|max:100'
        ]);
    }
}
