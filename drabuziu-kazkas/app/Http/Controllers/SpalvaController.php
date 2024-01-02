<?php

namespace App\Http\Controllers;

use App\Models\Spalva;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SpalvaController extends Controller
{
    public function index(): View
    {
        $spalvos = Spalva::all();
        return view('spalvos.index')->with('spalvos', $spalvos);
    }

    public function create()
    {
        $spalvos = Spalva::all();
        return view('spalvos.create', compact('spalvos'));
    }
    public function edit(string $id): View
    {
        $spalva = Spalva::find($id);

        // Check if the record is found
        if (!$spalva) {
            return redirect('spalva')->with('error_message', 'Spalva not found!');
        }

        // Fetch all categories for the dropdown
        $spalvosList = Spalva::where('id_Spalva', '!=', $spalva->id_Spalva)->get();

        return view('spalvos.edit', compact('spalva', 'spalvosList'));
    }
    public function show(string $id): View
    {
        $spalva = Spalva::find($id);
        return view('spalvos.show')->with('spalvos', $spalva);
    }

    public function store(Request $request): RedirectResponse
    {
        // Fetch all categories for the dropdown
        $spalvosList = Spalva::all();

        $validator = Validator::make($request->all(), [
            'id_Spalva' => 'required|integer|unique:spalvos',
            'Spalva' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('spalva/create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        Spalva::create($input);

        return redirect('spalva')->with('flash_message', 'Spalva Added!');
    }

    // Other methods remain the same...

    public function update(Request $request, string $id): RedirectResponse
{
    $spalva = Spalva::find($id);

    if (!$spalva) {
        return redirect('spalva')->with('error_message', 'Spalva not found!');
    }

    // Ensure that the ID is unique, excluding the current record
    $validator = Validator::make($request->all(), [
        'id_Spalva' => [
            'required',
            'integer',
            Rule::unique('spalvos')->ignore($spalva->id_Spalva, 'id_Spalva'),
        ],
        'Spalva' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect("spalva/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $input = $request->all();
    $spalva->update($input);

    return redirect('spalva')->with('flash_message', 'Spalva Updated!');
}

    public function destroy(string $id): RedirectResponse
    {
        Spalva::destroy($id);
        return redirect('spalva')->with('flash_message', 'Spalva deleted!');
    }

    // Other methods remain the same...
}
