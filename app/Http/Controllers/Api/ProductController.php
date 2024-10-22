<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends MainController
{
    public function index()
    {
        $products = Product::paginate(10);
        $paginationData = $this->getPaginationData($products);
        $products->load(['category']);
        $products = ProductResource::collection($products);
        
        return $this->successResponse('Products retrieved successfully', [
            'products' => $products,
            'pagination' => $paginationData
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
             'discount_type' => 'in:percentage,fixed',
            'discount' => 'nullable|numeric|min:0',
            'active' => 'required|boolean',
            'featured' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors()->first());
        }

        $data = $validator->validated();

        // Handle image upload
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('products', 'public');
            $data['img'] = $imagePath;
        }

        $product = Product::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar'],
            ],
            'content' => [
                'en' => $data['content_en'],
                'ar' => $data['content_ar'],
            ],
            'img' => $data['img'],
            'price' => $data['price'],
            'offer_price' => $data['offer_price'] ?? null,
            'discount_type' => $data['discount_type'] ?? null,
            'discount' => $data['discount'] ?? null,
            'active' => $data['active'],
            'featured' => $data['featured'],
            'category_id' => $data['category_id'],
        ]);
        $product->load(['category']);
        $product = new ProductResource($product);

        return $this->successResponse('Product created successfully', $product);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->notFoundResponse('Product not found');
        }
        $product->load(['category']);
        $product = new ProductResource($product);

        return $this->successResponse('Product retrieved successfully', $product);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name.en' => 'sometimes|required|string|max:255',
            'name.ar' => 'sometimes|required|string|max:255',
            'content.en' => 'sometimes|required|string',
            'content.ar' => 'sometimes|required|string',
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'sometimes|required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:percentage,fixed',
            'discount' => 'nullable|numeric|min:0',
            'active' => 'sometimes|required|boolean',
            'featured' => 'sometimes|required|boolean',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors()->first());
        }

        $data = $request->all();
        // dd($data);
        $product = Product::find($id);

        if (!$product) {
            return $this->notFoundResponse('Product not found');
        }

        if ($request->hasFile('img')) {
            if ($product->img) {
                Storage::disk('public')->delete($product->img);
            }
            $imagePath = $request->file('img')->store('products', 'public');
            $data['img'] = $imagePath;
        }
        

        $product->update([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar'],
            ],
            'content' => [
                'en' => $data['content_en'],
                'ar' => $data['content_ar'],
            ],
            'img' => $data['img'],
            'price' => $data['price'],
            'offer_price' => $data['offer_price'] ?? null,
            'discount_type' => $data['discount_type'] ?? null,
            'discount' => $data['discount'] ?? null,
            'active' => $data['active'],
            'featured' => $data['featured'],
            'category_id' => $data['category_id']
        ]);

        $product->load(['category']);
        $product = new ProductResource($product);
        return $this->successResponse('Product updated successfully', $product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->notFoundResponse('Product not found');
        }

        $product->delete();

        return $this->successResponse('Product deleted successfully');
    }
}
