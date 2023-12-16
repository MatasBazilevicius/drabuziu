<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manufacturer; // Import the Manufacturer model
use App\Models\Drabuziai; // Import the Drabuziai model
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public function showCreateForm()
    {
        // Fetch manufacturers for dropdown
        $manufacturers = Manufacturer::all();

        return view('products.create', ['manufacturers' => $manufacturers]);
    }

    public function createProduct(Request $request)
    {
        // Validate the request
        $request->validate([
            'Nuotrauka' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Pavadinimas' => 'required',
            'Aprasas' => 'required',
            'Kaina' => 'required|numeric',
            'Lytis' => 'required',
            'Sukurimo_data' => 'required|date',
            'fk_Gamintojasid_Gamintojas' => 'required|exists:manufacturers,id_Gamintojas',
        ]);

        // Retrieve form data
        $image = $request->file('Nuotrauka');
        $imageContent = addslashes(file_get_contents($image->getRealPath()));
        $name = $request->input('Pavadinimas');
        $description = $request->input('Aprasas');
        $price = $request->input('Kaina');
        $gender = $request->input('Lytis');
        $dateOfCreation = $request->input('Sukurimo_data');
        $manufacturerID = $request->input('fk_Gamintojasid_Gamintojas');

        // Insert data into the database
        Drabuziai::create([
            'Pavadinimas' => $name,
            'Aprasas' => $description,
            'Nuotrauka' => $imageContent,
            'Kaina' => $price,
            'Lytis' => $gender,
            'Sukurimo_data' => $dateOfCreation,
            'fk_Gamintojasid_Gamintojas' => $manufacturerID,
        ]);

        

        return redirect()->route('prekes')->with('success', 'Product created successfully!');
    }
    public function index()
    {
        $drabuziai = Drabuziai::all();
        return view('products', compact('drabuziai'));
    }

    public function addProductoCart($id)
{
    // Add the product to the cart (you should implement your logic here)

    // For example, using session to store the cart
    
    $product = Drabuziai::findOrFail($id);
    $cart = session()->get('cart', []);
    if(isset($cart[$id])){
        $cart[$id]['Kiekis']++;
    } else {
        $cart[$id] = [
            "Pavadinimas" => $product->Pavadinimas,
            "Kiekis" => 1,
            "Kaina" => $product->Kaina,
            "Nuotrauka" => $product->Nuotrauka
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
