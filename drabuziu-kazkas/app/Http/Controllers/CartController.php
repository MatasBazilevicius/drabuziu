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


        public function deleteProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Prekė sėkmingai ištrinta.');
        }
    }

    public function calculateCartTotal()
{
    $total = 0;

    if (session()->has('cart')) {
        foreach (session('cart') as $id => $details) {
            $total += $details['Kaina'] * $details['Kiekis'];
        }
    }

    return $total;
}

public function showPaymentPage()
{
    if (session('cart')) {
        // If there are items in the cart, proceed to the payment page
        return view('payment');  // Replace 'payment' with the actual name of your payment blade file
    } else {
        // If there are no items in the cart, set a flag and proceed to the payment page
        session()->flash('empty_cart', true);
        return view('payment');  // Replace 'payment' with the actual name of your payment blade file
    }
}


}


