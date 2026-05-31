<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        session(['user' => $user->fresh()]);
        return back()->with('success', 'Profile Updated');
    }

    public function editProfile(Request $request)
    {
        $user = User::find(session('user')->id);

        $user->update([
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'email'     => $request->email,
        ]);

        if ($request->filled('new_pass')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Current password is incorrect.');
            }
            $user->update(['password' => Hash::make($request->new_pass)]);
        }

        session(['user' => $user->fresh()]);

        return back()->with('success', 'Profile updated successfully.');
    }

}
