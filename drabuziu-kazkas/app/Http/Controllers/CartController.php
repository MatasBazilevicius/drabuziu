<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Add the product to the cart (you should implement your logic here)

        // For example, using session to store the cart
        $cart = $request->session()->get('cart', []);
        $cart[] = $productId;
        $request->session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart successfully']);
    }
}
