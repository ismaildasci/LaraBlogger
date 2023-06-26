<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:7|max:255',
        ]);

        if (!auth()->attempt($attributes)) {
            return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);

            // throw ValidationException::withMessages([
            //     'email' => 'Your provided credentials could not be verified.'
            // ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
