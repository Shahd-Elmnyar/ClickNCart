<?php

namespace App\Http\Controllers\website;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $featuredProducts = Product::where('featured', 1)->get();
        return view('website.index', compact('categories', 'featuredProducts'));
    }
    public function showCategory($id){
        $category = Category::findOrFail($id);
        return view('website.products.show', compact('category'));
    }
}
