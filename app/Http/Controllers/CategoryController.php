<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService) {}

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryService->createCategory($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function destroy($id)
    {
        $deleted = Category::where('id', $id)->delete();

        if ($deleted == 0)
            return redirect()
                ->route('categories.index')
                ->with('message', 'Failed to delete');

        return redirect()
            ->route('categories.index')
            ->with('message', 'Successfully deleted');
    }
}
