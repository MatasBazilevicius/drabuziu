<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $kategorijos = Category::all(); // Assuming you have a "Category" model

        return view('kategorijos.index', ['kategorijos' => $kategorijos]);
    }

    public function kategorijos_kurimas()
    {
        return view('kategorijos.create');
    }


    public function store(Request $request)
{
    $data = $request->validate([
        'pavadinimas' => 'required',
        'aprasymas' => 'required',
        'fk_Kategorijaid_Kategorija' => 'required'
    ]);

    $newCategory = Category::create($data);

    // Redirect to the index page or any other page after successfully creating the category
    return redirect()->route('kategorija.index')->with('flash_message', 'Kategorija ideta!');
}


    public function kategorijos_redagavimas(Category $kategorija)
    {
        return view('kategorija.edit',['kategorija' => $kategorija]);
    }

    public function update(Category $kategorija, Request $request){
        $data = $request->validate([
            'pavadinimas' => 'required',
            'aprasymas' => 'required|numeric',
            'fk_Kategorijaid_Kategorija' => 'nullable|decimal:0,2',
        ]);

        $kategorija->update($data);

        return redirect(route('kategorija.index'))->with('success', 'Product Updated Succesffully');

    }
    public function destroy(Category $kategorija)
    {
        $kategorija -> delete();
        return redirect(route('kategorija.index'))->with('success', 'Kategorija deleted!');
    }
}
