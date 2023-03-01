<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
	public function create()
	{
		return view('register.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'name' => 'string|required|max:255',
			'username' => ['string', 'required', 'max:255', 'unique:users,username'],
			'title' => ['string', 'required', 'max:255'],
			'email' => ['string', 'email', 'required', 'max:255', Rule::unique('users', 'email')],
			'password' => ['string', 'required', 'min:8']
		]);

		// A manual way replaced by the mutator in the User model
		// $attributes['password'] = bcrypt($attributes['password']);

		$user = User::create($attributes);

		Auth::login($user);

		// A different way of setting flash session value, replaced by redirect()->with()
		// session()->flash('success', 'Your account has been successfully created.');

		return redirect('/posts')->with('success', 'Your account has been successfully created.');
	}
}
