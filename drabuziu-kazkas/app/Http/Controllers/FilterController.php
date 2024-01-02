<?php
// app/Http/Controllers/FilterController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drabuziai; // Import the Drabuziai model

class FilterController extends Controller
{
    public function filterProducts(Request $request)
    {
        // Retrieve filter parameters from the request
        $category = $request->input('category');
        $priceRange = $request->input('priceRange');

        // Perform filtering based on selected values
        $filteredProducts = Drabuziai::when($category, function ($query) use ($category) {
            return $query->where('fk_Kategorijosid_Kategorija', $category);
        })
        ->when($priceRange, function ($query) use ($priceRange) {
            return $query->whereBetween('Kaina', [0, $priceRange]);
        })
        ->get();

        // You may return a view with the filtered products or handle it as needed
        return view('Prekes.filtered_products', ['products' => $filteredProducts]);
    }
}
