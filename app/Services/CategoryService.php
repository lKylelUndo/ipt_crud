<?php

namespace App\Services;

use App\Repository\CategoryRepository;

class CategoryService
{
    public function __construct(private CategoryRepository $categoryRepository) {}

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }
}
