<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function tryLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (User::where('email',$credentials['email'])->first()) {
            if(Auth::attempt($credentials)) {
                return response()->json("OK",200);
            } else {
                return response()->json("Bad password",403);
            }
        } else {
            return response()->json("User not found",404);
        }
    }
}
