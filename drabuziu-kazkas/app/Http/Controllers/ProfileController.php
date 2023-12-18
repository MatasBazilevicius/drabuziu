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
                'Slapyvardis' => 'required|string|max:255',
                'Vardas' => 'required|string|max:255',
                'El_Pastas' => 'required|email|max:255',
                'Pavarde' => 'required|string|max:255',
                'telefono_numeris' => 'required|string|max:255',
                'Adresas' => 'required|string|max:255',
                'Gimimo_data' => 'required|date',
            ]);
    
            $updateData = $request->only(['Slapyvardis', 'Vardas', 'El_Pastas', 'Pavarde', 'telefono_numeris', 'Adresas', 'Gimimo_data']);
            
            $user->update([
                'email' => $request->El_Pastas, // Use $request->Slapyvardis instead of $request->name
                'name' => $request->Slapyvardis
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
            $user->delete();
            Auth::logout();

            return redirect('/')->with('success', 'Your profile has been deleted.');
        }

        return redirect()->back()->with('error', 'Incorrect password. Please try again.');
    }
}
