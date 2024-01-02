<?php

namespace App\Http\Controllers;

use App\Models\Medziaga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class MedziagaController extends Controller
{
    public function index(): View
    {
        $medziagos = Medziaga::all();
        return view('medziagos.index')->with('medziagos', $medziagos);
    }

    public function create()
    {
        $medziagos = Medziaga::all();
        return view('medziagos.create', compact('medziagos'));
    }
    public function edit(string $id): View
    {
        $medziaga = Medziaga::find($id);

        // Check if the record is found
        if (!$medziaga) {
            return redirect('medziaga')->with('error_message', 'Medziaga not found!');
        }

        // Fetch all categories for the dropdown
        $medziagosList = Medziaga::where('id_Medziaga', '!=', $medziaga->id_Medziaga)->get();

        return view('medziagos.edit', compact('medziaga', 'medziagosList'));
    }
    public function show(string $id): View
    {
        $medziaga = Medziaga::find($id);
        return view('medziagos.show')->with('medziagos', $medziaga);
    }

    public function store(Request $request): RedirectResponse
    {
        // Fetch all categories for the dropdown
        $medziagosList = Medziaga::all();

        $validator = Validator::make($request->all(), [
            'id_Medziaga' => 'required|integer|unique:medziagos',
            'Medziaga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('medziaga/create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        Medziaga::create($input);

        return redirect('medziaga')->with('flash_message', 'Medziaga Added!');
    }

    // Other methods remain the same...

    public function update(Request $request, string $id): RedirectResponse
{
    $medziaga = Medziaga::find($id);

    if (!$medziaga) {
        return redirect('medziaga')->with('error_message', 'Medziaga not found!');
    }

    // Ensure that the ID is unique, excluding the current record
    $validator = Validator::make($request->all(), [
        'id_Medziaga' => [
            'required',
            'integer',
            Rule::unique('medziagos')->ignore($medziaga->id_Medziaga, 'id_Medziaga'),
        ],
        'Medziaga' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect("medziaga/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $input = $request->all();
    $medziaga->update($input);

    return redirect('medziaga')->with('flash_message', 'Medziaga Updated!');
}

    public function destroy(string $id): RedirectResponse
    {
        Medziaga::destroy($id);
        return redirect('medziaga')->with('flash_message', 'Medziaga deleted!');
    }

    // Other methods remain the same...
}
