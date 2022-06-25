<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        
        if (Auth::attempt($request->only('email', 'password'))) {

            return response()->json(Auth::user(), 200);
        } else {
            return response()->json(['status_message' => 'Failed to log you in']);
        }

        
        
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect']
        ]);
    
       
    }

    public function register(Request $request) {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


    }


}
