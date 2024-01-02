<?php

namespace App\Http\Controllers; // Make sure to include the correct namespace

use Illuminate\Http\Request;

class ProductController extends Controller // Extend the base Controller class
{
    public function preke1(Request $request)
    {
        // Using the Illuminate\Http\Request instance
        $product_id = $request->input('id');

        // Now you can use $product_id in your logic
        // For example, fetching data from the database
    }
}
