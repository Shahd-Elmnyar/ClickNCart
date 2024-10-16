<?php

namespace App\Http\Controllers\website;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show($id){
        $product = Product::findOrFail($id);
        return view('website.products.show', compact('product'));
    }
    
}
