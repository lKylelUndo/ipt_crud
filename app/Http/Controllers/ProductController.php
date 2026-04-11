<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct( private ProductService $productService, private CategoryService $categoryService ) {}

    public function index()
    {
        $products = $this->productService->getAllProducts();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();

        return view('products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->createProduct($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryService->getAllCategories();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $updated = $this->productService->updateProduct($request->validated(), $product->id);

        if (! $updated) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Product could not be updated.');
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $deleted = $this->productService->deleteProduct($product->id);

        if ($deleted == 0) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Product could not be deleted.');
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
