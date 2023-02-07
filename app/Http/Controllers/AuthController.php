<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function signup(CreatUser $request)
    {
        $validateData = $request->validated();
        $user = new User([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password']), // password 需做加密,要使用bcrypt
        ]);

        $user->save();
        return response('success', 201);

    }
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',

        ]);
        // dd($request->user()); // 未登入成功 會顯示null
        if (!Auth::attempt($validateData)) {
            return response('授權失敗', 401);
        }
        $user =$request->user();
        $tokenResult = $user->createToken('Token');
        dump($tokenResult);
    }


}
