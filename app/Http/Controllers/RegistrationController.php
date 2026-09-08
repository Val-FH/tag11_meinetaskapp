<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function show(Registration $registration)
    {
        return view('auth.registration_detail', ['registration' => $registration]);
    }
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:50'],
            'email'     => ['required', 'email', 'max:100', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'] //confirmed sucht automatisch nach einem feld mit dem namen "password_confirmation"
        ]);

        unset($validated['password_confirmation']); // Unnötig?
        $user = User::create($validated);
        
        Auth::login($user);

        $request->session()->regenerate(); // Sicherheitsmaßnahme

        return redirect()->route('tasks.index')->with('success', 'Willkommen zur TaskApp, ' . $user->name . '!');
    }
    public function edit(Registration $registration)
    {
        return view('auth.registration_edit', ['registration' => $registration]);
    }
    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:50'],
            'email'     => ['required', 'email', 'max:100', 'unique:users,email,' . $registration->id],
            'password'  => ['nullable', 'string', 'min:8', 'confirmed']
        ]);

        $registration->update($request->only('name', 'email', 'password'));

        return redirect()->route('tasks.index')->with('success', 'Profil erfolgreich aktualisiert!');
    }
    public function destroy(Registration $registration)
    {
        
        $registration->delete();

        return redirect()->route('welcome')->with('success', 'Profil erfolgreich gelöscht!');
    }
}
