<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drabuziai;
use App\Models\Kategorija;
use App\Models\Medziaga;
use App\Models\Gamintojas;


class FilterController extends Controller
{
    public function filterProducts(Request $request)
    {
        // Retrieve filter parameters from the request
        $selectedCategory = $request->input('selected_category');
        $selectedMedziaga = $request->input('selected_medziaga');
        $selectedGamintojas = $request->input('selected_gamintojas');
        $priceRange = $request->input('priceRange');

        // Perform filtering based on selected values
        $query = Drabuziai::query();

        if ($selectedCategory) {
            $query->where('fk_Kategorijosid_Kategorija', $selectedCategory);
        }

        if ($selectedMedziaga) {
            $query->where('fk_Medziagaid_Medziaga', $selectedMedziaga);
        }
        if ($selectedGamintojas) {
            $query->where('fk_Gamintojasid_Gamintojas', $selectedGamintojas);
        }

        if ($priceRange) {
            $query->whereBetween('Kaina', [0, $priceRange]);
        }

        $filteredProducts = $query->get();

        // Retrieve all categories and materials for display
        $kategorijos = Kategorija::orderBy("name", "ASC")->get();
        $medziagos = Medziaga::orderBy("name", "ASC")->get();
        $gamintojai = Gamintojas::orderBy("name", "ASC")->get();

        // You may return a view with the filtered products or handle it as needed
        
        return view('Prekes.filtered_products', compact('filteredProducts', 'kategorijos', 'medziagos','gamintojai'));
    }
}
