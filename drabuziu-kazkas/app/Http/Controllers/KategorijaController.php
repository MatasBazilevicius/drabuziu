<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Kategorija;
use Illuminate\View\View;

class KategorijaController extends Controller
{

    public function index(): View
    {
        $kategorijos = Kategorija::all();
        return view ('kategorijos.index')->with('kategorijos', $kategorijos);
    }

 
    public function create(): View
    {
        return view('kategorijos.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Kategorija::create($input);
        return redirect('kategorija')->with('flash_message', 'Student Addedd!');
    }

    public function show(string $id): View
    {
        $kategorija = Kategorija::find($id);
        return view('kategorijos.show')->with('kategorijos', $kategorija);
    }

    public function edit(string $id): View
    {
        $kategorija = Kategorija::find($id);
        return view('kategorijos.edit')->with('kategorijos', $kategorija);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $kategorija = Kategorija::find($id);
        $input = $request->all();
        $kategorija->update($input);
        return redirect('kategorija')->with('flash_message', 'student Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        Kategorija::destroy($id);
        return redirect('kategorija')->with('flash_message', 'Student deleted!'); 
    }
}