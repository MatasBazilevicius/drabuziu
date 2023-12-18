<?php
// app/Http/Controllers/ProductController2.php

use Illuminate\Http\Request;
use App\Models\Drabuziai;

class ProductController2 extends Controller
{
    public function showEditForm($id)
    {
        // Assuming you have a method to fetch product details by ID
        $product = $this->getProductDetailsById($id);

        return view('products.edit', ['row' => $product]);
    }

    public function updateProduct(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // Add validation rules for other fields as needed
        ]);

        // Retrieve form data
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        // Retrieve other fields as needed

        // Find the product by ID
        $product = Drabuziai::find($id);

        // Update the product
        $product->update([
            'Pavadinimas' => $name,
            'Aprasas' => $description,
            'Kaina' => $price,
            // Update other fields as needed
        ]);

        return redirect()->route('prekes')->with('success', 'Product updated successfully!');
    }

    // Add a method to fetch product details by ID
    private function getProductDetailsById($id)
    {
        // Create a database connection
        $conn = new \mysqli("localhost", "root", "", "parde");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statement to prevent SQL injection
        $sql = "SELECT * FROM drabuziai WHERE id_Drabuzis = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if there is a product with the given id_Drabuzis
        if ($result->num_rows > 0) {
            // Fetch the data for the specific product
            $row = $result->fetch_assoc();
            $stmt->close();
            $conn->close();
            return $row;
        } else {
            // Return an empty array or handle the case as needed
            return [];
        }
    }
}
