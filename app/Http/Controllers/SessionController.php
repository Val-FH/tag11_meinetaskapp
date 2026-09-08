<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required']
        ]);

        $credentials = $request->only('email', 'password');

        if(! auth()->attempt($credentials)) { // Selbe nachricht für falsches Password und falsche Emailadresse
            return back()->withErrors([
                'email'     => 'Keine Übereinstimmung gefunden',
            ])->withInput($request->only('email'));
        }

        $request->session()->regenerate();

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
