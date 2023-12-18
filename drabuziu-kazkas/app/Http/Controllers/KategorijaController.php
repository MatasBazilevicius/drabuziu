<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;

class KategorijaController extends Controller
{
    private $conn;
    public function __construct()
    {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = ""; // Replace with your actual database password
        $dbname = "parde"; // Replace with your actual database name

        // Create connection
        $this->conn = new \mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function index(Kategorija $kategorijaModel)
    {
        $kategorijos = $kategorijaModel::all();
        return view('kategorijos.index', ['kategorijos' => $kategorijos]);
    }

    public function create(){
        return view('kategorijos.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'pavadinimas' => 'required',
            'aprasymas' => 'required',
        ]);

        $newKategorija = Kategorija::create($data);

        return redirect(route('kategorija.index'));

    }

    public function edit(Kategorija $kategorija){
        return view('kategorijos.edit', ['kategorija' => $kategorija]);
    }

    public function update(Kategorija $kategorija, Request $request){
        $data = $request->validate([
            'pavadinimas' => 'required',
            'aprasymas' => 'required',
        ]);

        $kategorija->update($data);

        return redirect(route('kategorija.index'))->with('success', 'Kategorija Updated Succesffully');

    }

    public function destroy(Kategorija $kategorija){
        $kategorija->delete();
        return redirect(route('kategorija.index'))->with('success', 'Kategorija deleted Succesffully');
    }
    public function __destruct()
    {
        // Close the database connection when the controller is destroyed
        $this->conn->close();
    }
}