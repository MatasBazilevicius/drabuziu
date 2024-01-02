<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drabuziai;
use App\Models\Kategorija; // Make sure to import the relevant models
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\View;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        // Validate the request
        $request->validate([
            'Nuotrauka' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Pavadinimas' => 'required|string',
            'Aprasas' => 'required|string',
            'Kaina' => 'required|numeric',
            'Lytis' => 'required|string',
            'Sukurimo_data' => 'required|date',
            'fk_Gamintojasid_Gamintojas' => 'required|exists:manufacturers,id', // Make sure the manufacturer exists
            'selected_category' => 'required|exists:kategorijos,id', // Make sure the category exists
        ]);

        // Handle file upload
        $imagePath = $request->file('Nuotrauka')->store('images'); // Store the image in the storage directory

        // Create product using Eloquent
        $product = new Drabuziai();
        $product->Pavadinimas = $request->input('Pavadinimas');
        $product->Aprasas = $request->input('Aprasas');
        $product->Nuotrauka = $imagePath;
        $product->Kaina = $request->input('Kaina');
        $product->Lytis = $request->input('Lytis');
        $product->Sukurimo_data = $request->input('Sukurimo_data');
        $product->fk_Gamintojasid_Gamintojas = $request->input('fk_Gamintojasid_Gamintojas');
        $product->save();

        // Retrieve categories
        $kategorijos = Kategorija::orderBy("name", "ASC")->get();

        // Get the selected category from the request
        $selectedCategory = $request->input('selected_category');

        // Filter products by category
        $filteredProducts = Drabuziai::where('fk_Kategorijosid_Kategorija', $selectedCategory)->get();

        return view('prekes', ['products' => $filteredProducts, 'kategorijos' => $kategorijos])
            ->with('success', 'Product created successfully!');
    }
    // ProductController.php

    





    
}