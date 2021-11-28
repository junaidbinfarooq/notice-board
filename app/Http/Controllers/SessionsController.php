<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(): Factory|View
    {
        return view('sessions.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(): Redirector|RedirectResponse
    {
        $attributes = request()?->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy(): Redirector|RedirectResponse
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
