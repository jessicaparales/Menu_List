<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile(){
        return view('profile');
    }

    public function editPicture(Request $request){
        $user = User::find(session('user')->id);

        if($request->hasFile('profile_pic')){
            $file = $request->file('profile_pic');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'),$filename);

            $user->update([
                'profile_picture'=>$filename
            ]);
        }

        return back()->with('success', 'Profile Updated');
    }

}
