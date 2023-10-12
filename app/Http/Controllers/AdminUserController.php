<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminUserController extends Controller
{

 public function addAdmin(){
     return view('admin.user-admin.add_user');
 }

public function addAdminStore(Request $request){
     $this->validate($request,[
         'name' => 'required',
         'email' => 'required',
         'photo' => 'required',
         'password' => 'required',

     ]);

     if ($request->hasFile('photo')){
         $image = $request->file('photo');
         $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(200,200)->save('admin/profile/'.$unique_name);
     }



     Admin::insert([
         'name' => $request->name,
         'email' => $request->email,
         'photo' => $unique_name,
         'password' => Hash::make($request->password),
         'slider' => $request->slider,
         'about' => $request->about,
         'couses' => $request->courses,
         'gallery' => $request->gallery,
         'team' => $request->team,
         'testimonial' => $request->testimonial,
         'blog' => $request->blog,
         'contact' => $request->contact,
         'count_banner' => $request->count_banner,
         'sponsor' => $request->sponsor,
         'comments' => $request->comments,
         'events' => $request->events,
         'donation' => $request->donation,
         'admin_user' => $request->admin_user,
         'created_at' => Carbon::now(),
     ]);

     $notification = array(
         'message' => 'Admin User Created Successfully',
         'type' => 'success'
     );

     return redirect()->route('admin.user')->with($notification);

    }

    public function AdminUser(){
       $data = Admin::latest()->get();

     return view('admin.user-admin.admin_user',compact('data'));
    }

    public function AdminUserEdit($id){
        $edit_data = Admin::find($id);
        return view('admin.user-admin.admin_user_edit',compact('edit_data'));
    }

    public function AdminUserUpdate(Request $request,$id){
        $update_data = Admin::find($id);

        if ($request->file('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save('admin/profile/'.$unique_name);
            @unlink('admin/profile/'.$request->old_photo);

        }else{
            $unique_name = $request->old_photo;
        }

        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->photo = $unique_name;
        $update_data->slider = $request->slider;
        $update_data->about = $request->about;
        $update_data->couses = $request->courses;
        $update_data->gallery = $request->gallery;
        $update_data->team = $request->team;
        $update_data->testimonial = $request->testimonial;
        $update_data->blog = $request->blog;
        $update_data->contact = $request->contact;
        $update_data->count_banner = $request->count_banner;
        $update_data->sponsor = $request->sponsor;
        $update_data->comments = $request->comments;
        $update_data->events = $request->events;
        $update_data->donation = $request->donation;
        $update_data->admin_user = $request->admin_user;
        $update_data->updated_at = Carbon::now();
        $update_data->update();



        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);

    }



    public function AdminUserDelete($id){
        $delete_data = Admin::find($id);
        $delete_data->delete();


        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);
    }





}
