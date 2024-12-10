<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => 'login berhasil',
                'token' => Auth::user()->createToken("auth-token")->plainTextToken
            ]);
        }
        return response()->json([
            'message' => 'login gagal'
        ]);
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'city_id' => 'required|exists:cities,id'
        ]);
        
        $user = User::create($request->all());
        $user->createToken('auth-token')->plainTextToken;
        return response()->json([
            'message' => 'user berhasil ditambahkan'
        ]);
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'telah logout'
        ]);
    }
}
