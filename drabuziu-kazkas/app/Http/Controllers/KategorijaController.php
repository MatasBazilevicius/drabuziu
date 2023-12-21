<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Kategorija;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class KategorijaController extends Controller
{
    public function index(): View
    {
        $kategorijos = Kategorija::all();
        return view('kategorijos.index')->with('kategorijos', $kategorijos);
    }

    public function create()
    {
        $kategorijos = Kategorija::all();
        return view('kategorijos.create', compact('kategorijos'));
    }

    public function store(Request $request): RedirectResponse
{
    // Fetch all categories for the dropdown
    $kategorijosList = Kategorija::all();

    $validator = Validator::make($request->all(), [
        'id_Kategorija' => 'required|integer|unique:kategorijos',
        'pavadinimas' => 'required',
        'aprasymas' => 'required',
        'fk_Kategorijaid_Kategorija' => [
            'nullable',
            Rule::exists('kategorijos', 'id_Kategorija')->where(function ($query) use ($kategorijosList) {
                // Check if the selected value is either null or exists in the kategorijosList
                $query->whereIn('id_Kategorija', [null, ...$kategorijosList->pluck('id_Kategorija')->toArray()]);
            }),
            function ($attribute, $value, $fail) use ($request) {
                $inputName = $request->input('pavadinimas');
                if ($value == $inputName) {
                    $fail('Parent category cannot be the same as the category itself.');
                }
            },
        ],
    ]);

    if ($validator->fails()) {
        return redirect('kategorija/create')
            ->withErrors($validator)
            ->withInput();
    }

    $input = $request->all();
    Kategorija::create($input);

    return redirect('kategorija')->with('flash_message', 'Kategorija Added!');
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
        $kategorijosList = Kategorija::where('id_Kategorija', '!=', $kategorija->id_Kategorija)->get();

        return view('kategorijos.edit', compact('kategorija', 'kategorijosList'));
    }

    public function update(Request $request, string $id): RedirectResponse
{
    $kategorija = Kategorija::find($id);

    if (!$kategorija) {
        return redirect('kategorija')->with('error_message', 'Kategorija not found!');
    }

    // Fetch all categories for the dropdown
    $kategorijosList = Kategorija::where('id_Kategorija', '!=', $kategorija->id_Kategorija)->get();

    // Ensure that the ID is unique, excluding the current record
    $validator = Validator::make($request->all(), [
        'id_Kategorija' => [
            'required',
            'integer',
            Rule::unique('kategorijos')->ignore($kategorija->id_Kategorija, 'id_Kategorija'),
        ],
        'pavadinimas' => 'required',
        'aprasymas' => 'required',
        'fk_Kategorijaid_Kategorija' => [
            'nullable',
            Rule::exists('kategorijos', 'id_Kategorija')->where(function ($query) use ($kategorijosList) {
                // Check if the selected value is either null or exists in the kategorijosList
                $query->whereIn('id_Kategorija', [null, ...$kategorijosList->pluck('id_Kategorija')->toArray()]);
            }),
            function ($attribute, $value, $fail) use ($kategorija) {
                if ($value == $kategorija->id_Kategorija) {
                    $fail('Parent category cannot be the same as the category itself.');
                }
            },
        ],
    ]);

    if ($validator->fails()) {
        return redirect("kategorija/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $input = $request->all();
    $kategorija->update($input);

    return redirect('kategorija')->with('flash_message', 'Kategorija Updated!');
}

    public function destroy(string $id): RedirectResponse
    {
        Kategorija::destroy($id);
        return redirect('kategorija')->with('flash_message', 'Kategorija deleted!');
    }
}
