<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class AdminProfileController extends Controller
{
    public function profileView(){
        $id = Auth::guard('admin')->id();
        $admin_data = Admin::find($id);

        return view('admin.profile.profile',compact('admin_data'));
    }

    public function profileEdit(){
        $id = Auth::guard('admin')->id();
        $admin_edit = Admin::find($id);

        return view('admin.profile.profile_edit',compact('admin_edit'));
    }



    public function profileUpdate(Request $request){
        $id = Auth::guard('admin')->id();
        $admin_update = Admin::find($id);

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('admin/profile/'.$unique_name);
            @unlink('admin/profile/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }
        $admin_update->name = $request->name;
        $admin_update->email = $request->email;
        $admin_update->photo = $unique_name;
        $admin_update->update();

        $notification = array(
            'message' => 'Admin Data Updated Successfully',
            'type' => 'success'
        );

        return redirect()->route('profile.show')->with($notification);

    }

}
