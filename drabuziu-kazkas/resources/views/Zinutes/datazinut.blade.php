<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drabuziai; // Replace Drabuziai with the actual model name

class ZinutPerz extends Controller
{
    public function preke($id)
    {
        // Retrieve the product from the Drabuziai table using the $id
        $product = Drabuziai::find($id);

        // Check if the product exists
        if (!$product) {
            abort(404); // You can customize this based on your error handling logic
        }

        // Pass the product data to the view
        return view('preke')->with('product', $product);
    }

    
}
