<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Uzsakymai;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;


class OrderController extends Controller
{


    public function checkOrderInformation(Request $request)
    {
        // Generate values for non-user input fields
        $request->merge([
            'id_Uzsakymas' => $this->generateOrderId(),
            'fk_Krepselisid_Krepselis' => $this->generateBasketId(),
            'fk_Nuolaidų_Kodaiid_Nuolaidų_Kodai' => $this->generateDiscountCodeId(),
            'fk_Apmokejimasid_Apmokejimas' => $this->generatePaymentId(),
        ]);

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'Uzsakymo_num' => 'required|integer',
            'suma' => 'required|numeric',
            'Vardas' => 'required|string',
            'Pavarde' => 'required|string',
            'Gatves_adresas' => 'required|string',
            'Miestas' => 'required|string',
            'Pasto_kodas' => 'required|string',
            'Pristatymo_salis' => 'required|string',
            'pristatymo_budas' => 'required|string',
            'busena' => 'required|string',
            'id_Uzsakymas' => 'required|integer|unique:uzsakymai',
            'fk_Krepselisid_Krepselis' => 'nullable|integer',
            'fk_Nuolaidų_Kodaiid_Nuolaidų_Kodai' => 'nullable|integer',
            'fk_Apmokejimasid_Apmokejimas' => 'required|integer',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Perform the insertion into the database using Eloquent
        uzsakymai::create($request->all());

        return response()->json(['message' => 'Order information checked successfully!']);
    }

    private function generateOrderId()
    {
        // Generate a random 8-digit order ID
        return rand(10000000, 99999999);
    }

    private function generateBasketId()
    {
        // Generate a random 6-digit basket ID
        return rand(100000, 999999);
    }

    private function generateDiscountCodeId()
    {
        // Generate a random 4-digit discount code ID
        return rand(1000, 9999);
    }

    private function generatePaymentId()
    {
        // Generate a random 5-digit payment ID
        return rand(10000, 99999);
    }

    public function enterOrderIdForm()
    {
        return view('uzsakymai.sektiuzsakyma');
    }

    public function viewOrderInformation($orderId)
    {
        // Fetch order information from the database
        $order = Uzsakymai::where('id_Uzsakymas', $orderId)->first();

        if (!$order) {
            return view('uzsakymai.order-not-found');
        }

        return view('uzsakymai.view-order-information', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form to enter the order ID.
     *
     * @return \Illuminate\View\View
     */
    public function showOrderStatusForm()
    {
        return view('uzsakymai.pildytiuzsakyma');
    }

    /**
     * Show the form to edit the order status.
     *
     * @param int $orderId
     * @return \Illuminate\View\View
     */
    public function editOrderStatusForm($orderId)
    {
        $order = Uzsakymai::where('id_Uzsakymas', $orderId)->first();
    
        if (!$order) {
            // Handle case where the order is not found
            abort(404);
        }
    
        return view('uzsakymai.pildytiuzsakymapvz', compact('order'));
    }

    /**
     * Update the order status.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $orderId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrderStatus(Request $request, $orderId)
    {
        // Validation logic if needed
        $request->validate([
            'new_status' => 'required|string',
        ]);

        // Find the order
        $order = Uzsakymai::where('id_Uzsakymas', $orderId)->first();   

        if (!$order) {
            // Handle case where the order is not found
            abort(404);
        }

        // Update the order status
        $order->busena = $request->input('new_status');
        $order->save();

        // Respond with a success message (you can customize this part based on your needs)
        return response()->json(['message' => 'Order status updated successfully.']);
    }
}

