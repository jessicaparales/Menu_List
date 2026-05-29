<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     public function showDashboard(){
        $users= User::all();    
        return view("users", compact("users"));
     
     }
     public function addUser(Request $request){
      if(User::where('email', $request->email)->exists()){
         return back()->with('error','Email already exist!');
      }

      if($request->cnfrm !== $request->pswd){
         return back()->with("error","Password do not match!");
      }
   
      User::create([
         "firstname"=> $request->fname,
         "lastname"=> $request->lname,
         "email"=> $request->email,
         "password"=> Hash::make($request->password),
         "role"=> $request->role
      ]);

      return back()->with("success","Account Created Successfully! ");
   }
   public function editUser(Request $request, $id){
      $user = User::where("id", $request->id)->first();
      if(!$user){
         return back()->with('error','Unable to edit user');
      }
      $user->update([
         'firstname'=>$request->editfname,
         'lastname'=>$request->editlname,
         'email'=>$request->editemail,
         'status'=>$request->editstatus,
      ]);
      return back()->with('success','Edit successfully');
   }
      
   public function deleteUser($id){
      $user = User::where("id", $id)->first();
      if(!$user){
         return back()->with('error','Unable to delete user');
      }
      $user->delete();
      return back()->with('success','User Deleted Successfully!');
   }
}