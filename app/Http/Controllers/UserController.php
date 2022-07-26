<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public static function create()
    {
        return view('user.create');
    }

    public static function store()
    {

        $formFields = request()->validate([
            'name' => 'required',
            'email' => ['email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:5'],
            'type' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'Account created successfully!');
    }

    public static function login()
    {
        // dd(session());
        return view('user.login');
    }

    public static function authenticate()
    {
        $userCreds = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        
        $loginSuccessful = Auth::attempt($userCreds);

        if ($loginSuccessful) {
            request()->session()->regenerate();
            return redirect()->intended()->with('message', 'Logged in!');
        }

        return back()->withErrors(['email' => 'Credentials invalid.']);
    }

    public static function logout()
    {
        if (Auth::user()) {
            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }
        return redirect('/');
    }

    public static function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    public static function destroy(User $user)
    {
        $deletionSuccessfull = $user->delete();

        if ($deletionSuccessfull) {
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/')->with('message', 'Account deleted successfully.');
        }

        return redirect('/')->with('message', 'Account could not be deleted.');
    }
}
