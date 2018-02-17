<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{
    //eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExLCJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2p3dC9wdWJsaWMvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNTEzNTA4MzY5LCJleHAiOjE1MTM1MTE5NjksIm5iZiI6MTUxMzUwODM2OSwianRpIjoiWlhDbnJFU3prV2hnczZGWCJ9.PeTYA3EFw7Dml25g_bGZVg1WQfhx_9Pkubns3IJfZWE

    public function authenticate()
    {     
        //get user data
        $credentials = request()->only('email','password');
        //check if user credentials are correct
        try{
            //generate a token
            $token = JWTAuth::attempt($credentials);
            //No we don't have any token- Credentials are wrong
            if(!$token){
                return response()->json(['error' => 'Invalid Credentials hero'],401);
            }

        }catch (JWTException $e){
            return response()->json(['error' => 'Something went wrong'],500);
        }
        //return a token
        return response()->json(['token' => $token],200);     
    }

    public function register()
    { 
        $email = request()->email;
        $name = request()->name;
        $password = request()->password;

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
            
        $token =JWTAuth::fromUser($user);
        
        return response()->json(['token' => $token],200);

    }

    
}
