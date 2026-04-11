<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::with('category')->orderBy('product_name')->get();
    }

    public function createProduct($data) 
    {
        return Product::create($data);
    }

    public function updateProduct($data, $id) 
    {
        return Product::where('id', $id)->update($data);
    }
    
    public function deleteProduct($id) 
    {
        return Product::where('id', $id)->delete();
    }
}
