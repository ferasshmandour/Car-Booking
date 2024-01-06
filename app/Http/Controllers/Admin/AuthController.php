<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        try {
            $formFields = $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
            if (Auth::guard('admin')->attempt($formFields)) {
                $request->session()->regenerate();
            }
            return redirect('/admin-dashboard/cars');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin-sign-in');
    }
}
