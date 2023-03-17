<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.settings');
    }

    public function updateProfile()
    {
        $user = auth()->user();
        $attributes = request()->validate([
            'dob' => ['required' , 'date'],
            'phone' => ['required' ,'digits:10', 'numeric'],
            'name' => ['required'],
            'gender' => ['required'],
            'email' => ['required','email',  Rule::unique('users')->ignore(auth()->user()->id)],
        ]);



        if (request()->hasFile('profile_pic')) {
            $image = request()->file('profile_pic');

            request()->validate([
                'profile_pic' => 'image'
            ]);



            // $filename = $image->store('public/images/profile');
            $filename = $image->store('public/images/profile');

            $attributes['profile_pic'] = substr($filename, 7);
            $user->update($attributes);
        } else {
            $user->update($attributes);
        }


        return redirect('/settings')->with('success', 'successfully Updated');
    }

    public function changePassword()
    {
        $user = auth()->user();

        $attributes = request()->validate([
            'old_password' => ['required' , 'current_password'],
            'password' => ['required' , 'confirmed' , Password::min(8)]
        ]);

        // #Match The Old Password
        // if(!Hash::check($attributes['old_password'], auth()->user()->password)){
        //     return back()->with("error", "Old Password Doesn't match!");
        // }

        #Update the new Password
        $user->update([
           'password' => $attributes['password']
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}
