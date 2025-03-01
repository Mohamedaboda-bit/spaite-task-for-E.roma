<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function redirectTo(){
        return '/employees';
    } 

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function username() {
        return 'name'; 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/employees');
        }
        // dd('Auth failed', Auth::check(), $credentials);

        return back()->withErrors(['name' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}