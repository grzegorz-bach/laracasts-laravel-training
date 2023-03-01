<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['login' => 'Your provided credentials could not be verified']);
        }

        //Prevent session fixation attack
        session()->regenerate();

        return redirect(RouteServiceProvider::HOME)->with('success', 'Welcome back!');
    }

    public function destroy()
    {

        auth()->logout(); //could use Auth::logout() here as a alternative

        return redirect('/posts')->with('success', 'Goodbye!');
    }
}
