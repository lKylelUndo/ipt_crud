<?php

namespace App\Services;

use App\Models\Product;
use App\Repository\ProductRepository;

class ProductService
{
    public function __construct(private ProductRepository $productRepository) {}

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function createProduct($data)
    {
        $validator = Product::validate($data);

        if ($validator->fails())
            return response()->json($validator->errors(), 400);

        return $this->productRepository->createProduct($data);
    }

    public function updateProduct($data, $id)
    {
        $updated = $this->productRepository->updateProduct($data, $id);

        if (!$updated) 
            return response()->json([ 'message' => 'Product failed to update or not existed' ], 400);
        
        return response()->json([ 'message' => 'Product updated' ], 200);
    }

    public function deleteProduct($id)
    {
        $deleted = $this->productRepository->deleteProduct($id);

        if (!$deleted) 
            return response()->json([ 'message' => 'Product not found' ], 404);
        
        return response()->json([ 'message' => 'Product deleted' ], 200);
    }
}
