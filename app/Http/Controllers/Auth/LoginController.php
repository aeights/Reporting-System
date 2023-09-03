<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:3',
            ]);
    
            if ($validated) {
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                return redirect('/dashboard');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
