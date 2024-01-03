<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drabuziai;
use App\Models\Kategorija;
use App\Models\Medziaga;
use App\Models\Gamintojas;
use App\Models\Spalva;
use App\Models\Dydis;


class FilterController extends Controller
{
    public function filterProducts(Request $request)
    {
        // Retrieve filter parameters from the request
        $selectedCategory = $request->input('selected_category');
        $selectedMedziaga = $request->input('selected_medziaga');
        $selectedGamintojas = $request->input('selected_gamintojas');
        $selectedSpalva = $request->input('selected_spalva');
        $selectedDydis = $request->input('selected_dydis');
        $priceRange = $request->input('priceRange');

        // Perform filtering based on selected values
        $query = Drabuziai::query();

        if ($selectedCategory) {
            $query->where('fk_Kategorijosid_Kategorija', $selectedCategory);
        }
        
        if ($selectedMedziaga) {
            $query->where('fk_id_Medziagos_medziagos', $selectedMedziaga);
        }
        
        if ($selectedGamintojas) {
            $query->where('fk_id_Gamintojas_Gamintojai', $selectedGamintojas);
        }
        
        if ($selectedSpalva) {
            $query->where('fk_id_Spalva_spalvos', $selectedSpalva);
        }
        
        if ($selectedDydis) {
            $query->where('fk_id_Dydis_dydis', $selectedDydis);
        }
        
        if ($priceRange) {
            $query->whereBetween('Kaina', [0, $priceRange]);
        }

        $filteredProducts = $query->get();

        // Retrieve all categories and materials for display
        $kategorijos = Kategorija::orderBy("pavadinimas", "ASC")->get();
        $medziagos = Medziaga::orderBy("Medziaga", "ASC")->get();
        $gamintojai = Gamintojas::orderBy("Gamintojas", "ASC")->get();
        $spalvos = Spalva::orderBy("Spalva", "ASC")->get();
        $dydziai = Dydis::orderBy("name", "ASC")->get();

        // You may return a view with the filtered products or handle it as needed
        return view('Prekes.filtered_products', compact('filteredProducts', 'kategorijos', 'medziagos', 'gamintojai', 'spalvos', 'dydziai'));
    }
}

