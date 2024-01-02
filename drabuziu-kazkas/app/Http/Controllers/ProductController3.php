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

    public function edit($id)
    {
        // Retrieve the product by ID from the database
        $product = DB::table('drabuziai')->where('id_Drabuzis', $id)->first();
    
        // You can add any additional logic here if needed before returning the view
        return view('Prekes.Prekiuinfo.prekeRedag', ['productName' => $product->Pavadinimas]);
    }
    

    
    


    // Add update method for handling the form submission to update a product
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'Pavadinimas' => 'required',
            'Aprasas' => 'required',
            'Kaina' => 'required|numeric',
            'Kiekis' => 'required|numeric',
            'Sukurimo_data' => 'required|date',
            'Lytis' => 'required|numeric',
            'fk_id_Gamintojas_Gamintojai' => 'required|numeric',
            'fk_id_Spalva_spalvos' => 'required|numeric',
            'fk_id_Dydis_dydis' => 'required|numeric',
            'fk_id_Medziagos_medziagos' => 'required|numeric',
            // Add validation rules for other fields as needed
        ]);

        // Retrieve form data
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

        // Update the product in the database
        DB::table('drabuziai')->where('id_Drabuzis', $id)->update([
            'Pavadinimas' => $name,
            'Aprasas' => $description,
            'Kaina' => $price,
            'Kiekis' => $quantity,
            'Sukurimo_data' => $dateOfCreation,
            'Lytis' => $gender,
            'fk_id_Gamintojas_Gamintojai' => $manufacturerID,
            'fk_id_Spalva_spalvos' => $colorID,
            'fk_id_Dydis_dydis' => $sizeID,
            'fk_id_Medziagos_medziagos' => $materialID,
        ]);

        return redirect()->route('prekes')->with('success', 'Produktas sėkmingai atnaujintas!');
    }
}
