<?php

namespace App\Http\Controllers;

use App\Models\Dydis;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class DydisController extends Controller
{
    public function index(): View
    {
        $dydziai = Dydis::all();
        return view('dydziai.index')->with('dydziai', $dydziai);
    }

    public function create()
    {
        $dydziai = Dydis::all();
        return view('dydziai.create', compact('dydziai'));
    }
    public function edit(string $id): View
    {
        $dydis = Dydis::find($id);

        // Check if the record is found
        if (!$dydis) {
            return redirect('dydis')->with('error_message', 'Dydis not found!');
        }

        // Fetch all categories for the dropdown
        $dydziaiList = Dydis::where('id_Dydis', '!=', $dydis->id_Dydis)->get();

        return view('dydziai.edit', compact('dydis', 'dydziaiList'));
    }
    public function show(string $id): View
    {
        $dydis = Dydis::find($id);
        return view('dydziai.show')->with('dydziai', $dydis);
    }

    public function store(Request $request): RedirectResponse
    {
        // Fetch all categories for the dropdown
        $dydziaiList = Dydis::all();

        $validator = Validator::make($request->all(), [
            'id_Dydis' => 'required|integer|unique:dydziai',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('dydis/create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        Dydis::create($input);

        return redirect('dydis')->with('flash_message', 'Dydis Added!');
    }

    // Other methods remain the same...

    public function update(Request $request, string $id): RedirectResponse
{
    $dydis = Dydis::find($id);

    if (!$dydis) {
        return redirect('dydis')->with('error_message', 'Dydis not found!');
    }

    // Ensure that the ID is unique, excluding the current record
    $validator = Validator::make($request->all(), [
        'id_Dydis' => [
            'required',
            'integer',
            Rule::unique('dydziai')->ignore($dydis->id_Dydis, 'id_Dydis'),
        ],
        'name' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect("dydis/{$id}/edit")
            ->withErrors($validator)
            ->withInput();
    }

    $input = $request->all();
    $dydis->update($input);

    return redirect('dydis')->with('flash_message', 'Dydis Updated!');
}

    public function destroy(string $id): RedirectResponse
    {
        Dydis::destroy($id);
        return redirect('dydis')->with('flash_message', 'Dydis deleted!');
    }

    // Other methods remain the same...
}
