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

        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        // throw ValidationException::withMessages([
        //     'email' => 'Your provided credentials could not be verified.'
        // ]);

        return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
