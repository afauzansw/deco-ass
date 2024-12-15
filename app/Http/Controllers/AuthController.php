<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) return redirect(route('dashboard.index'));
        return Inertia::render('Auth/Login');
    }

    public function attempt(LoginRequest $request)
    {
        $payload = $request->validated();
        $login = Auth::guard()->attempt($payload);
        $request->session()->regenerate();

        if ($login) {
            return Inertia::location(route('dashboard.index'));
        } else {
            return Inertia::render('Auth/Login', [
                'error' => 'Email atau password salah',
            ]);;
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('auth.login');
    }
}
