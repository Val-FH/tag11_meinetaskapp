<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
  
    public function create() // ein neuer eintrag wird erstallt
    {
        return view('auth.register');
    }

    public function store(Request $request) //wir wollen unsere daten speichern, stehen in $request
    {    // wir wollen die abgegebenen daten validieren
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:50'],
            'email'     => ['required', 'email', 'max:100', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'] //confirmed sucht automatisch nach einem feld mit dem namen "password_confirmation"
        ]);

        // Wir legen unseren User in der Datenbank an. , praktisch weil alles in Variable
        $user = User::create($validated);
        //User wird eingeloggt
        Auth::login($user);

        $request->session()->regenerate(); // Sicherheitsmaßnahme
        //wir werden auf die nächste seite geleitet
        return redirect()->route('tasks.index')->with('success', 'Willkommen zur TaskApp, ' . $user->name . '!');
    }
}