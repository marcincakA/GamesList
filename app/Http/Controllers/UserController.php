<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password'=> ['required', 'min:8', 'max:20']
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);
        $incomingFields['password'] = strip_tags($incomingFields['password']);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');

    }

    function logout() {
        auth()->logout();
        return redirect('/');
    }

    function login(Request $request) {
        $incomingFields = $request->validate([
            'login_name' => ['required'],
            'login_password'=> ['required']
        ]);
        $incomingFields['login_name'] = strip_tags($incomingFields['login_name']);
        $incomingFields['login_password'] = strip_tags($incomingFields['login_password']);

        if (auth()->attempt([
            'name' => $incomingFields['login_name'],
            'password' => $incomingFields['login_password']
        ])) {
            $request->session()->regenerate();
        }

        return redirect('/');

    }
}