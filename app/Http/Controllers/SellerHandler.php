<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SellerHandler extends Controller
{
    public function reset_password(Request $request){
        $curr_password = $request->curr_password;
        $new_password  = $request->new_password;
        $confirm_password  = $request->confirm_password;

        $validation = Validator::make( $request->all() ,[
            'new_password' => 'required|min:8'
        ]);

        if($validation->fails()){
            return redirect()->back()->with('error', 'Invalid New Password');
        }

        if($new_password == $curr_password){
            return redirect()->back()->with('error', 'New Password must not be same as Current Password');
        }

        if($new_password != $confirm_password){
            return redirect()->back()->with('error', 'New Password does not match Confirm Password');
        }

        if(!Hash::check($curr_password, Auth::user()->password)){
            return redirect()->back()->with('error', 'The specified password does not match');
        }
        else{
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
    }
}
