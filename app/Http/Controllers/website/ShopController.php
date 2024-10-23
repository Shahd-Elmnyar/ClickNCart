<?php

namespace App\Http\Controllers\website;

use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by price range
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // Filter by size
        if ($request->has('sizes')) {
            $sizes = explode(',', $request->sizes);
            $query->whereHas('sizes', function ($q) use ($sizes) {
                $q->whereIn('name', $sizes);
            });
        }

        // Sort products
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name->en', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name->en', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(9)->appends($request->query());
        $categories = Category::withCount('products')->get();
        $sizes = Size::all();

        return view('website.shop', compact('products', 'categories', 'sizes'));
    }

}
