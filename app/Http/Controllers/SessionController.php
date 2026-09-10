<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionController extends Controller
{
    public function create() //wir wollen eine session beginnen also wollen wir in den log in
    {
        return view('auth.login');
    }

    public function store(Request $request) 
    //um eingeloggt zu bleiben und die datenbank abzufragen, müssen wir speichern
    {   //anfragen an datenbank immer validieren
        $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'] // Password::default() auch möglich laravel service
        ]);
         //wir wollen uns einloggen
        $credentials = $request->only('email', 'password');

        if(! Auth::attempt($credentials)) { // Selbe nachricht für falsches Password und falsche Emailadresse
           //wenn falsches passwort wird eine meldung ausgegeben und zurückgebracht auf seite, deshalb return back 
        return back()->withErrors([ 
                'email'     => 'Keine Übereinstimmung gefunden',
            ])->withInput($request->only('email')); // eingabe e mail
        }
              // session regenerate recykelt alles verhindert aber das leute alte tokens verwenden
        $request->session()->regenerate();
        // wir leiten weiter weil der log in geklappt hat
        return redirect()->route('tasks.index');
    }
  public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate(); // Session Informationen löschen
        $request->session()->regenerateToken();

        return redirect()->route('welcome')->with('success', 'Erfolgreich ausgeloggt');
    }
}
