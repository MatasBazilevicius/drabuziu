<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Kategorija;
use Illuminate\Validation\Rule;

class KategorijaController extends Controller
{
    public function index(): View
    {
        $kategorijos = Kategorija::all();
        return view('kategorijos.index')->with('kategorijos', $kategorijos);
    }

    public function create()
    {
        $kategorijos = Kategorija::all(); // Fetch all categories
        return view('kategorijos.create', compact('kategorijos'));
    }



    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Kategorija::create($input);
        return redirect('kategorija')->with('flash_message', 'Kategorija Addedd!');
    }

    public function show(string $id): View
    {
        $kategorija = Kategorija::find($id);
        return view('kategorijos.show')->with('kategorijos', $kategorija);
    }

    public function edit(string $id): View
{
    $kategorija = Kategorija::find($id);

    // Check if the record is found
    if (!$kategorija) {
        return redirect('kategorija')->with('error_message', 'Kategorija not found!');
    }

    // Fetch all categories for the dropdown
    $kategorijosList = Kategorija::all();

    return view('kategorijos.edit', compact('kategorija', 'kategorijosList'));
}



public function update(Request $request, string $id): RedirectResponse
{
    $kategorija = Kategorija::find($id);

    // Check if the record is found
    if (!$kategorija) {
        return redirect('kategorija')->with('error_message', 'Kategorija not found!');
    }

    // Validate the request data
    $request->validate([
        'id_Kategorija' => [
            'required',
            Rule::unique('kategorijos')->ignore($kategorija->id_Kategorija, 'id_Kategorija'),
        ],
        'pavadinimas' => 'required',
        'aprasymas' => 'required',
        'fk_Kategorijaid_Kategorija' => 'nullable|exists:kategorijos,id_Kategorija',
        // Ensure that the selected value exists in the kategorijos table, or it can be null.
    ]);

    $input = $request->all();
    $kategorija->update($input);

    return redirect('kategorija')->with('flash_message', 'Kategorija Updated!');
}


    public function destroy(string $id): RedirectResponse
    {
        Kategorija::destroy($id);
        return redirect('kategorija')->with('flash_message', 'kategorija deleted!');
    }
}
