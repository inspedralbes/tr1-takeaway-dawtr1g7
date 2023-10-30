<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'telefon' => 'required|string|min:7',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'telefon' => $fields['telefon'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('GalaxiaGutemberg')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Comprovar email
        $user = User::where('email', $fields['email'])->first();

        // Comprovar usuari i contrasenya
        if (!$user) {
            return response([
                'message' => 'L\'usuari no existeix',
                'errors' => []
            ], 401);
        } else if (!Hash::check($fields['password'], $user->password)) {
            return response([
                'message'=> 'La contrasenya és incorrecta',
                'errors' => []    
            ],401);
        }

        $token = $user->createToken('GalaxiaGutemberg')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'S\'ha tancat la sessió',
        ];
    }
}
