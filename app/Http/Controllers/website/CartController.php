<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->items = collect(); 
            $cart->total_price = 0;
        }
        return view('website.cart', compact('cart'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->total = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1,
                'price' => $product->price,
                'total' => $product->price,
            ]);
        }

        $this->updateCartTotal($cart);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function updateQuantity(Request $request, $cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->quantity = $request->quantity;
        $cartItem->total = $cartItem->quantity * $cartItem->price;
        $cartItem->save();

        $this->updateCartTotal($cartItem->cart);

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    public function removeItem($cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cart = $cartItem->cart;
        $cartItem->delete();

        $this->updateCartTotal($cart);

        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }

    private function updateCartTotal(Cart $cart)
    {
        $cart->total_price = $cart->items->sum('total');
        $cart->save();
    }
}
