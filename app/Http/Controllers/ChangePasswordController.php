<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changeView(){
        return view('admin.profile.change_password');
    }

    public function changePassword(Request $request){
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hash_pass = Auth::guard('admin')->user()->password;

        if ( Hash::check($request->old_password,$hash_pass)== true ){
            $id = Auth::guard('admin')->user()->id;
            $pass = Admin::find($id);
            $pass->password = Hash::make($request->password);
            $pass->update();
        }
        $notification = array(
            'message' => 'Password Change Successfully',
            'type' => 'success'
        );

        return redirect()->route('admin.dashboard')->with($notification);

    }
}
