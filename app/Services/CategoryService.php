<?php

namespace App\Services;

use App\Models\Category;
use App\Repository\CategoryRepository;

class CategoryService
{
    
    // Dependency Injection
    public function __construct(private CategoryRepository $categoryRepository) {}

    public function createCategory($data) 
    {
        $validator = Category::validate($data);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return $this->categoryRepository->create($data);
    }
}
