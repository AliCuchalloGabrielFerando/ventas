<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(Request $request){
        //necesitamos validar 
        $request->validate([
            "email" => "required|string",
            "password" => "required|string"
        ]);
        //verificar si el correo existe
        $user = User::where('email',$request->email)->first();
        if (!$user && !Hash::check($request->password, $user->password)){
            return response()->json([
                "mensaje"=> "usuario no existe"
            ],401);
        }
        //verificar el password
        //generar el token
        $token = $user->createToken('miToken')->plainTextToken;
        //enviar una respuesta
        return response()->json([
            "usuario"=> $user,
            "token"=> $token

        ],200);

    }
    public function logout(Request $request){
        //auth()->user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();
        return ['mensaje'=>"token eliminado"];
    }
}
