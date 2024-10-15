<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $product_columns = ['name', 'content', 'img', 'price', 'offer_price', 'discount_type', 'discount', 'active', 'category_id', 'created_by'];
    public function __construct(){
        // $this->middleware('auth'); //ensure if the logged in or not(redirect to logging in )
    }
    public function index()
    {
        // Retrieve all products, accessible to any authenticated user
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $products = Product::with(['colors', 'sizes', 'category'])->get(); // Eager loading
        return view('products.index', compact(['categories','products']));
    }

    public function create()
    {
    // $this->authorize('create', Category::class);// Only allow if authorized
    $categories = Category::whereNull('parent_id')->with('children')->get();
    $product = Product::with(['colors', 'sizes', 'category'])->get();
        $colors = Color::all();
        $sizes = Size::all();

    return view('products.create', compact(['categories','product','colors','sizes']));
    }

    public function store(Request $request)
    {
        // Authorize the user to create a new product
        // $this->authorize('create', Product::class);

        // Validate request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'img'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'offer_price' => 'nullable|numeric|min:0|lt:price', // Offer price must be less than the original price
            'discount_type' => 'nullable|in:percentage,flat', // Only allow specific discount types
            'discount' => 'nullable|numeric|min:0', // Validating discount value
            'active' => 'required|boolean', // Ensure active is a boolean value
            'category_id' => 'required|exists:categories,id', // Ensure category_id exists in categories table
            'color' => 'nullable|array', // New color attribute
            'size' => 'nullable|array', // New size attribute
            'created_by' => 'nullable',
        ]);
 // Handle file upload
 if ($request->hasFile('img')) {
    $imagePath = $request->file('img')->store('products', 'public');
    $data['img'] = $imagePath;
}
$data['created_by'] = Auth::id();
 $product=Product::create($data);
 // Sync colors and sizes
 if ($request->colors) {
    $product->colors()->sync($request->colors);
}

if ($request->sizes) {
    $product->sizes()->sync($request->sizes);
}
// Create the Product with the validated data


return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit( $id)
    {
        $product = Product::with(['colors', 'sizes', 'category'])->get();
        $categories = Category::all();
        $products = Product::findOrFail($id);
        $colors = Color::all();
        $sizes = Size::all();
        // Authorize the user to edit the product
        // $this->authorize('update', $product);

        return view('products.edit', compact(['product','products','categories','colors','sizes']));
    }

    public function update(Request $request, Product $product)
    {
        // Authorize the user to update the product
        // $this->authorize('update', $product);

        // Validate request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'img'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'offer_price' => 'nullable|numeric|min:0|lt:price', // Offer price must be less than the original price
            'discount_type' => 'nullable|in:percentage,flat', // Only allow specific discount types
            'discount' => 'nullable|numeric|min:0', // Validating discount value
            'active' => 'required|boolean', // Ensure active is a boolean value
            'color' => 'nullable|array', // New color attribute
            'size' => 'nullable|array', // New size attribute
            'category_id' => 'required|exists:categories,id', // Ensure category_id exists in categories table
            'created_by' => 'nullable',
        ]);

         // Handle file upload
    if ($request->hasFile('img')) {
        // Delete old image if exists
        if ($product->img) {
            Storage::delete('public/' . $product->img);
        }

        $imagePath = $request->file('img')->store('products', 'public');
        $data['img'] = $imagePath;
    }

    $product->update($data);
  // Sync colors and sizes
  if ($request->colors) {
    $product->colors()->sync($request->colors);
}

if ($request->sizes) {
    $product->sizes()->sync($request->sizes);
}


        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
               // Find the category by its ID
               $product = Product::findOrFail($id);
        // Authorize the user to delete the product
        // $this->authorize('delete', $product);

        // Delete the product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function trashed()
    {
        $trashedProducts = Product::onlyTrashed()->get();
        return view('products.trashed', compact('trashedProducts'));
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
    public function showProducts(Request $request) {
        // Start building the query
        $query = Product::where('active', 1);
        $allCount = $query->count();
  // Fetch the filtered products
  $products = $query->get();

        // Filter by category name (men, women, children)
        if ($request->has('category')) {
            $categoryName = $request->input('category');

            // Filter based on the category name
             $query->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName); // Assuming 'name' is the category column
            });
        }

        // Filter by size if provided
        if ($request->has('sizes')) {
            $sizes = $request->input('sizes');
            $query->whereHas('sizes', function ($query) use ($sizes) {
                $query->whereIn('name', $sizes);
            });
        }

        // Filter by color if provided
        if ($request->has('colors')) {
            $colors = $request->input('colors');
            $query->whereHas('colors', function ($query) use ($colors) {
                $query->whereIn('name', $colors);
            });
        }

        // Filter by price if provided
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Sorting options
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_low_high':
                    // Order by offer_price if it exists, otherwise by price
                    $query->orderByRaw('COALESCE(offer_price, price) ASC');
                    break;
                case 'price_high_low':
                    // Order by offer_price if it exists, otherwise by price
                    $query->orderByRaw('COALESCE(offer_price, price) DESC');
                    break;
            }
        }

        // Execute the query and get the filtered products
        $activeProducts = $query->get();

        // Get the counts for each category by name
        $menCount = Product::whereHas('category', function($query) {
            $query->where('name', 'Men');
        })->count();

        $womenCount = Product::whereHas('category', function($query) {
            $query->where('name', 'Women');
        })->count();

        $childrenCount = Product::whereHas('category', function($query) {
            $query->where('name', 'Children');
        })->count();



        // Get all unique sizes from the active products
        $sizes = Size::whereHas('products', function ($query) {
            $query->where('products.active', 1); // Specify the table name
        })->get();

        // Get all unique colors from the active products
        $colors = Color::whereHas('products', function ($query) {
            $query->where('products.active', 1); // Specify the table name
        })->get();

        // Return the view with the filtered products
        return view('website.shop', compact('products','activeProducts', 'menCount', 'womenCount', 'childrenCount','allCount', 'sizes', 'colors'));
    }



    public function showSingleProduct($id) {
        // Fetch the product by its ID
        $product = Product::findOrFail($id);  // This will return a 404 if not found
        return view('website.shop-single', compact('product'));
    }

    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }
}
