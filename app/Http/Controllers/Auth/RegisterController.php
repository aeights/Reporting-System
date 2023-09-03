<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // dd($request);
        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|min:3|unique:users,username',
                'phone_number' => 'required|unique:users,phone_number',
                'password' => 'required|min:3',
            ]);

            if ($validated) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'username' => $request->username,
                    'phone_number' => $request->phone_number,
                    'password' => Hash::make($request->password),
                ]);
                Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ]);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
