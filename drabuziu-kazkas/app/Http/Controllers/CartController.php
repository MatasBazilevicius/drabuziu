<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drabuziai; // Update the model name to Drabuziai

use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function addProducttoCart($id)
    {
        // For example, using session to store the cart

        $cart = session()->get('cart', []);
        $cart = is_array($cart) ? $cart : []; // Initialize $cart as an array if needed

        $drabuzis = DB::table('drabuziai')->where('id_Drabuzis', $id)->first();

        if (isset($cart[$id])) {
            $cart[$id]['Kiekis']++;
        } else {
            $cart[$id] = [
                "Pavadinimas" => $drabuzis->Pavadinimas,
                "Kiekis" => 1,
                "Kaina" => $drabuzis->Kaina,
                "Nuotrauka" => $drabuzis->Nuotrauka
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Prekė buvo pridėta į krepšelį');
    }

    public function ProductCart()
    {
        return view('cart');
    }
}


