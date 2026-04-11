<?php

namespace App\Services;

use App\Repository\ProductRepository;

class ProductService
{
    public function __construct(private ProductRepository $productRepository) {}

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->createProduct($data);
    }

    public function updateProduct(array $data, int $id): bool
    {
        return (bool) $this->productRepository->updateProduct($data, $id);
    }

    public function deleteProduct(int $id): bool
    {
        return (bool) $this->productRepository->deleteProduct($id);
    }
}
