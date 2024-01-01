<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Naudotojai;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $naudotojai = Naudotojai::where('id_Naudotojas', $user->id)->first();

        return view('profiles.edit', compact('user', 'naudotojai'));
    }

    public function update(Request $request)
    {
        try {
            $user = auth()->user();
            $naudotojai = Naudotojai::where('id_Naudotojas', $user->id)->first();
    
            if (!$naudotojai) {
                \Illuminate\Support\Facades\Log::error('User profile not found!');
                return redirect()->route('profile.edit')->with('error', 'User profile not found.');
            }
    
            $request->validate([
                'Slapyvardis' => 'nullable|string|max:255',
                'Vardas' => 'nullable|string|max:255',
                'El_Pastas' => 'nullable|email|max:255',
                'Pavarde' => 'nullable|string|max:255',
                'telefono_numeris' => 'nullable|string|max:255',
                'Adresas' => 'nullable|string|max:255',
                'Gimimo_data' => 'nullable|date',
            ]);
    
            $updateData = $request->only(['Slapyvardis', 'Vardas', 'El_Pastas', 'Pavarde', 'telefono_numeris', 'Adresas', 'Gimimo_data']);
            
            $user->update([
                'email' => $request->filled('El_Pastas') ? $request->El_Pastas : $user->email,
                'name' => $request->filled('Slapyvardis') ? $request->Slapyvardis : $user->name,
            ]);            

            $naudotojai->update($updateData);
    
            \Illuminate\Support\Facades\Log::info('Update successful!', [
                'user_id' => $user->id,
                'update_data' => $updateData,
            ]);
    
            return redirect()->route('profile.edit')->with('success', 'Duomenys sėkmingai atnaujinti!');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error updating profile: ' . $e->getMessage());
            return redirect()->route('profile.edit')->with('error', 'An error occurred while updating the profile.');
        }
    }


    public function showDeleteForm()
    {
        return view('profiles.delete');
    }

    public function deleteProfile(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);
    
        $user = Auth::user();
    
        if (Hash::check($request->password, $user->password)) {
            // Delete entries from both 'users' and 'naudotojai' tables
            $user->delete();
    
            // Assuming 'Naudotojai' model is used for the 'naudotojai' table
            Naudotojai::where('id_Naudotojas', $user->id)->delete();
    
            Auth::logout();
    
            return redirect('/')->with('success', 'Your profile has been deleted.');
        }
    
        return redirect()->back()->with('error', 'Incorrect password. Please try again.');
    }
}
