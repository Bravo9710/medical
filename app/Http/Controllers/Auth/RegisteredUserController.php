<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'blood_group' => ['nullable', 'string', 'max:255'],
            'egn' => ['required', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $userByEmail = User::where('email', $validatedData['email'])->first();
        $userByEgn = User::where('egn', $validatedData['egn'])->first();

        if ($userByEmail || $userByEgn) {
            $errors = [];
            if ($userByEmail) {
                $errors['email'] = 'The provided email is already in use.';
            }
            if ($userByEgn) {
                $errors['egn'] = 'The provided EGN is already in use.';
            }
            return redirect()->back()->withErrors($errors);
        }

        $user = User::create($validatedData);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
