<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController3 extends Controller
{
    public function create()
    {
        // You can add any additional logic here if needed before returning the view
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Add any validation rules if needed
        ]);

        // Retrieve form data
        $image = $request->file('Nuotrauka');
        $imageContent = addslashes(file_get_contents($image->getRealPath()));
        $name = $request->input('Pavadinimas');
        $description = $request->input('Aprasas');
        $price = $request->input('Kaina');
        $quantity = $request->input('Kiekis');
        $dateOfCreation = $request->input('Sukurimo_data');
        $gender = $request->input('Lytis');
        $manufacturerID = $request->input('fk_id_Gamintojas_Gamintojai');
        $colorID = $request->input('fk_id_Spalva_spalvos');
        $sizeID = $request->input('fk_id_Dydis_dydis');
        $materialID = $request->input('fk_id_Medziagos_medziagos');

        // Insert data into the database
        DB::table('drabuziai')->insert([
            'Pavadinimas' => $name,
            'Aprasas' => $description,
            'Nuotrauka' => $imageContent,
            'Kaina' => $price,
            'Kiekis' => $quantity,
            'Sukurimo_data' => $dateOfCreation,
            'Lytis' => $gender,
            'fk_id_Gamintojas_Gamintojai' => $manufacturerID,
            'fk_id_Spalva_spalvos' => $colorID,
            'fk_id_Dydis_dydis' => $sizeID,
            'fk_id_Medziagos_medziagos' => $materialID,
        ]);

        return redirect()->route('prekes')->with('success', 'Product created successfully!');
    }
}
