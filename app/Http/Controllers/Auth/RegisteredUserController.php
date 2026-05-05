<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * =========================================
     * SHOW REGISTRATION FORM
     * =========================================
     * This method returns the register page view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    /** * Handle an incoming registration request. * * @throws ValidationException */

    public function store(Request $request): RedirectResponse
    {
        //  VALIDATION 
        // Ensure all input data is correct before saving user
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class // ensure email is not already taken
            ],

            'phone' => ['nullable', 'string', 'max:20'], // optional phone field

            'age' => ['nullable', 'integer'], // optional age field

            'password' => [
                'required',
                'confirmed', // checks password_confirmation field
                Rules\Password::defaults() // Laravel default strong password rules
            ],
        ]);

        //  CREATE USER 
        // Store validated user data in database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,

            // Always hash password for security
            'password' => Hash::make($request->password)
        ]);

        //  TRIGGER EVENT 
        // Laravel event (useful for email verification, logs, etc.)
        event(new Registered($user));

        //  AUTO LOGIN 
        // Log the user in immediately after registration
        Auth::login($user);

        //  REDIRECT 
        // Send user to dashboard after successful registration
        return redirect(route('dashboard', absolute: false));
    }
}