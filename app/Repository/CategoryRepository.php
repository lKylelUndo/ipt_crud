<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::orderBy('category_name')->get();
    }

    public function create($data)
    {
        return Category::create($data);
    }
}
