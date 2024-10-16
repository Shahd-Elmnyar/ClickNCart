<?php

namespace App\Http\Controllers\admin;

use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'sizes'])->get();
        return view('admin.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'sizes']);
        return view('admin.products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        return view('admin.products.create', compact('categories', 'sizes'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $sizes = Size::all();
        return view('admin.products.edit', compact('product', 'categories', 'sizes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'price' => 'required|numeric',
            'img' => 'required|image|max:2048',
            'offer_price' => 'nullable|numeric',
            'discount_type' => 'required|string|in:percentage,fixed',
            'discount' => 'nullable|numeric',
            'active' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'sizes' => 'array',
            'sizes.*' => 'exists:sizes,id',
        ]);

        // Handle boolean fields
        $validatedData['active'] = $request->has('active');
        $validatedData['featured'] = $request->has('featured');

        // Combine name_en and name_ar into a single array
        $validatedData['name'] = [
            'en' => $validatedData['name_en'],
            'ar' => $validatedData['name_ar']
        ];

        // Combine content_en and content_ar into a single array
        $validatedData['content'] = [
            'en' => $validatedData['content_en'],
            'ar' => $validatedData['content_ar']
        ];

        // Remove individual name and content fields
        unset($validatedData['name_en'], $validatedData['name_ar']);
        unset($validatedData['content_en'], $validatedData['content_ar']);

        // Handle image upload
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('products', 'public');
            $validatedData['img'] = $imagePath;
        }

        $product = Product::create($validatedData);

        if (isset($validatedData['sizes'])) {
            $product->sizes()->attach($validatedData['sizes']);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'price' => 'required|numeric',
            'img' => 'nullable|image|max:2048',
            'offer_price' => 'nullable|numeric',
            'discount_type' => 'required|string|in:percentage,fixed',
            'discount' => 'nullable|numeric',
            'active' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'sizes' => 'array',
            'sizes.*' => 'exists:sizes,id',
        ]);

        // Handle boolean fields
        $validatedData['active'] = $request->has('active');
        $validatedData['featured'] = $request->has('featured');

        // Handle image upload
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('products', 'public');
            $validatedData['img'] = $imagePath;
        }

        $validatedData['name'] = [
            'en' => $validatedData['name_en'],
            'ar' => $validatedData['name_ar']
        ];

        // Combine content_en and content_ar into a single array
        $validatedData['content'] = [
            'en' => $validatedData['content_en'],
            'ar' => $validatedData['content_ar']
        ];

        // Remove individual name and content fields
        unset($validatedData['name_en'], $validatedData['name_ar']);
        unset($validatedData['content_en'], $validatedData['content_ar']);

        $product->update($validatedData);

        if (isset($validatedData['sizes'])) {
            $product->sizes()->sync($validatedData['sizes']);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product moved to trash successfully.');
    }

    /**
     * Display a listing of trashed resources.
     */
    public function trashed()
    {
        $trashedProducts = Product::onlyTrashed()->get();
        return view('admin.products.trash', compact('trashedProducts'));
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('products.trashed')->with('success', 'Product restored successfully.');
    }

    /**
     * Permanently remove the specified resource from storage.
     */
    public function forceDelete($id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        // Delete the associated image
        if ($product->img) {
            Storage::disk('public')->delete($product->img);
        }

        $product->forceDelete();

        return redirect()->route('products.trashed')->with('success', 'Product permanently deleted.');
    }
}
