<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drabuziai;
use App\Models\Kategorija;

class FilterController extends Controller
{
    public function filterProducts(Request $request)
    {
        // Retrieve filter parameters from the request
        $category = $request->input('category');
        $priceRange = $request->input('priceRange');

        // Perform filtering based on selected values
        $query = Drabuziai::query();

        if ($category) {
            $query->where('fk_Kategorijosid_Kategorija', $category);
        }

        if ($priceRange) {
            $query->whereBetween('Kaina', [0, $priceRange]);
        }

        $filteredProducts = $query->get();

        // Retrieve all categories for display
        $kategorijos = Kategorija::all();

        // You may return a view with the filtered products or handle it as needed
        return view('Prekes.filtered_products', compact('filteredProducts', 'kategorijos'));
    }
}
