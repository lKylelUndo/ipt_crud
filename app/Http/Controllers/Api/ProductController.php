<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService) {}

    public function index(): JsonResponse
    {
        $products = $this->productService->getAllProducts();

        return response()->json($products);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->productService->createProduct($request->validated());

        return response()->json($product->load('category'), 201);
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $updated = $this->productService->updateProduct($request->validated(), $product->id);

        if (! $updated) {
            return response()->json(['message' => 'Product failed to update or does not exist.'], 400);
        }

        return response()->json([
            'message' => 'Product updated',
            'product' => $product->fresh()->load('category'),
        ]);
    }

    public function destroy(Product $product): JsonResponse
    {
        $deleted = $this->productService->deleteProduct($product->id);

        if (! $deleted) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json(['message' => 'Product deleted']);
    }
}
