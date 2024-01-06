<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function signIn()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        try {
            $formFields = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            if (Auth::guard('web')->attempt($formFields)) {
                $request->session()->regenerate();
            }
            return redirect('/');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function signUp()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        try {
            $formFields = $request->validate([
                'name' => 'required',
                'email' => ['required', 'email', 'unique:users,email,except,id'],
                'phone' => ['required', 'numeric', 'unique:users,phone,except,id'],
                'password' => ['required', 'min:8'],
            ]);

            User::create([
                'name' => $formFields['name'],
                'email' => $formFields['email'],
                'phone' => $formFields['phone'],
                'password' => $formFields['password'],
            ]);

            if (Auth::guard('web')->attempt($formFields)) {
                $request->session()->regenerate();
            }

            return redirect('/');
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
