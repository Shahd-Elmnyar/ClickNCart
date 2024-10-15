<?php

namespace App\Http\Controllers\website;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $user = Auth::user();
        $wishlistItems = $user ? $user->favorites : collect();
        return view('website.wishlist', compact('wishlistItems'));
    }

    public function add($id)
    {
        $user = Auth::user();
        if ($user) {
            $product = Product::find($id);
            $user->favorites()->attach($product);
            return redirect()->back()->with('success', 'Product added to wishlist');
        }
        return redirect()->route('login')->with('error', 'Please login to add items to your wishlist');
    }

    public function remove($id)
    {
        $user = Auth::user();
        if ($user) {
            $user->favorites()->detach($id);
            return redirect()->route('wishlist')->with('success', 'Product removed from wishlist');
        }
        return redirect()->route('login')->with('error', 'Please login to manage your wishlist');
    }
}
