<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        //1. Setup validator

        $validator= Validator::make($request->all(), [
            'name'=>'required|string|max:255',
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required|min:8'
        ]);

        // 2. Cek Validator
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        // 3. Create user
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),

        ]);
        
        // 4. Cek Keberhasilan
        if($user){
            return response()->json([
                'success'=>true,
                'message'=> 'User created succesfully',
                'data'=>$user
            ],201);
        }

        // 5. Cek Gagal
        return response()->json([
            'success'=>false,
            'message'=> 'User Creation Fail'
        ],409);
    }


    // Login

    public function login(Request $request){

        // 1. Setup Validator

        $validator= Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=> 'required'
        ]);

        // 2. Cek Validator

        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        // 3. Get Kredensial dari request

        $credentials = $request->only('email','password');

        // 4. Get isFailed

        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success'=>false,
                'message'=>'Email atau Password Anda Salah!'
            ],401);
        }


        // 5. Cek isSucces
        return response()->json([
            'success'=>true,
            'message'=> 'Login Succesfully',
            'user'=> auth()->guard('api')->user(),
            'token'=>$token
        ],200);

    }

    public function logout(){

        // Try 
        // 1. Invalid token
        // 2. Check IsSucces
        // Catch
        // cek is failed

        try{
            JWTAuth::invalidate(JWTAuth::getToken());
            
            return response()->json([
                'success'=>true,
                'message'=> 'Logout successfully'
            ],200);
        }catch(JWTException $e){
            return response()->json([
                'success'=>false,
                'message'=> 'Logout Failed'

            ],500);
        }
       
    }
}
