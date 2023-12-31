<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Payment extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
{
    // Check if TotalAmount is set (discount code applied)
    if ($request->has('TotalAmount')) {
        $amount = $request->input('TotalAmount');
    } else {
        // Use the original cart total
        $amount = $request->input('price');
    }

    // Process payment logic here using $amount
    // ...

    // Redirect or return response
}

}
