<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'username'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        
        User::create([
            'username' => $request -> username,
            'email' => $request -> email,
            'password' =>$request -> Hash::make(password)
        ]);

        return redirect('/registration')->with('success','Successfully registred');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // $credentials=$request->only('email','password');
        // if(Auth::attempt($credentials)){
        //     return "success";
        // }
        // else{
        //     return "Not success";
        // }
            
        $user = User::where('email','=',$request->email)->first();
        //return $user;
        if($user)
        {
            if(Hash::check($request->password,$user->password)){
                //return "Login Successfully";
                $request->session()->put('loginId',$user->id);
                return redirect('home');
            }
            else{
                return back()->with("fail","Password doesn't match");
            }

        }
        else{
            return back()->with("fail","Email not registered");
        }
    }
}
