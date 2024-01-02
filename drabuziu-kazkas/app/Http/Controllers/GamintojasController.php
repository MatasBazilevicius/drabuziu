<?php

namespace App\Http\Controllers;

use App\Models\Gamintojas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class GamintojasController extends Controller
{
    public function index(): View
    {
        $gamintojai = Gamintojas::all();
        return view('gamintojai.index')->with('gamintojai', $gamintojai);
    }

    public function create()
    {
        $gamintojai = Gamintojas::all();
        return view('gamintojai.create', compact('gamintojai'));
    }
    public function edit(string $id): View
    {
        $gamintojas = Gamintojas::find($id);

        // Check if the record is found
        if (!$gamintojas) {
            return redirect('gamintojai')->with('error_message', 'Gamintojas not found!');
        }

        // Fetch all categories for the dropdown
        $gamintojaiList = Gamintojas::where('id_Gamintojas', '!=', $gamintojas->id_Gamintojas)->get();

        return view('gamintojai.edit', compact('gamintojas', 'gamintojaiList'));
    }
    public function show(string $id): View
    {
        $gamintojas = Gamintojas::find($id);
        return view('gamintojai.show')->with('gamintojai', $gamintojas);
    }

    public function store(Request $request): RedirectResponse
    {
        // Fetch all categories for the dropdown
        $gamintojaiList = Gamintojas::all();

        $validator = Validator::make($request->all(), [
            'id_Gamintojas' => 'required|integer|unique:gamintojai',
            'Gamintojas' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('gamintojas/create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        Gamintojas::create($input);

        return redirect('gamintojas')->with('flash_message', 'Gamintojas Added!');
    }

    // Other methods remain the same...

    public function update(Request $request, string $id): RedirectResponse
{
    $gamintojas = Gamintojas::find($id);

    if (!$gamintojas) {
        return redirect('gamintojas')->with('error_message', 'gamintojas not found!');
    }

    // Ensure that the ID is unique, excluding the current record
    $validator = Validator::make($request->all(), [
        'id_Gamintojas' => [
            'required',
            'integer',
            Rule::unique('gamintojai')->ignore($gamintojas->id_Gamintojas, 'id_Gamintojas'),
        ],
        'gamintojas' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect("gamintojas/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $input = $request->all();
    $gamintojas->update($input);

    return redirect('gamintojas')->with('flash_message', 'gamintojas Updated!');
}

    public function destroy(string $id): RedirectResponse
    {
        Gamintojas::destroy($id);
        return redirect('gamintojas')->with('flash_message', 'gamintojas deleted!');
    }

    // Other methods remain the same...
}
