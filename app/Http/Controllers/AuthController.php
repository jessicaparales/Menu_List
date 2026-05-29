<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

   public function showRegister(){
    return view("signup");
   }

   public function showLogin(){
      return view("login");
   }

   public function signup(Request $request){
      if(User::where('email', $request->email)->exists()){
         return back()->with('error','Email already exist!');
      }

      if($request->cnfrm !== $request->pswd){
         return back()->with("error","Password do not match!");
      }
   
      User::create([
         "firstname"=> $request->firstname,
         "lastname"=> $request->lastname,
         "email"=> $request->email,
         "password"=> Hash::make($request->pswd),
      ]);

      return back()->with("success","Account Created Successfully! ");
   }

   public function login(Request $request){
    $user = User::where("email", $request->email)->first();
   
    if(!$user || !Hash::check($request->password, $user->password)){
      return back()->with("error","Invalid Credentials");

    }
    session(["user"=> $user]);
    return redirect('/home')->with("success","Log in successfully!");
   }

   public function logout(){
      session()->forget('user');
      return redirect('login')->with('success','Logged out successfully!');
   }
}

