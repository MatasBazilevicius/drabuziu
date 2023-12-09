use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function preke1(Request $request)
    {
        // Using the Illuminate\Http\Request instance
        $product_id = $request->input('id');

        // Now you can use $product_id in your logic
        // For example, fetching data from the database
    }
}
