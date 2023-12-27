<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija; // Replace Drabuziai with the actual model name

class KategorijaPerz extends Controller
{
    public function kategorija($id)
    {
        // Retrieve the product from the Drabuziai table using the $id
        $kategorija = Kategorija::find($id);

        // Check if the product exists
        if (!$kategorija) {
            abort(404); // You can customize this based on your error handling logic
        }

        // Pass the product data to the view
        return view('kategorija')->with('kategorija', $kategorija);
    }

    
}
