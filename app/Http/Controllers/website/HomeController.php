<?php

namespace App\Http\Controllers\website;

use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $featuredProducts = Product::where('featured', 1)->get();
        return view('website.index', compact('categories', 'featuredProducts'));
    }
    public function showCategory($id)
    {
        $categories = Category::withCount('products')->get();
        $sizes = Size::all();
        $currentCategory = Category::findOrFail($id);

        $products = Product::whereHas('category', function ($query) use ($id) {
            $query->where('categories.id', $id);
        })->paginate(12); // Adjust the number as needed

        return view('website.shop', compact('categories', 'sizes', 'products', 'currentCategory'));
    }
}
