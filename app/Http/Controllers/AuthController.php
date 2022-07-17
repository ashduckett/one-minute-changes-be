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
            return response()->json(['status_message' => 'Failed to log you in', 'status_code' => 401]);
        }

        
        
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect']
        ]);
    
       
    }

    public function register(Request $request) {
        // Before Laravel validation, check to see if the email exists so a custom response is possible
        $email = $request->email;
        if (User::where('email', '=', $request->email)->exists()) {
            return response()->json(['status_message' => 'Email already exists', 'status_code' => 401]);
        }


        // return $email;
        
        
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['status_message' => 'User successfully created', 'status_code' => 200]);

    }


}
