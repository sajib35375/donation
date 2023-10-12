<?php

namespace App\Http\Controllers;

use App\Models\Testibanner;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class TestimonialController extends Controller
{
    public function showTestimonial(){
        $testimonial = Testimonial::latest()->get();
        $edit = Testibanner::find(1);
        return view('admin.testimonial.testimonial',compact('testimonial','edit'));
    }

    public function storeTestimonial(Request $request){
        $this->validate($request,[
            'quote' => 'required',
            'username' => 'required',
            'designation' => 'required',
            'photo' => 'required',

        ]);

        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $unique_photo = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(50,50)->save('admin/image/testimonial/'.$unique_photo);
        }


        Testimonial::insert([
            'Quote' => $request->quote,
            'username' => $request->username,
            'designation' => $request->designation,
            'user_photo' => $unique_photo,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Testimonial Added Successfully',
            'type' => 'success'
        );

        return redirect()->route('show.testimonial')->with($notification);

    }
    public function storeTestimonialBanner(Request $request){
        $update = Testibanner::find(1);

        $unique_banner = '';
        if ($request->hasFile('banner')){
            $image = $request->file('banner');
            $unique_banner = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1400)->save('admin/image/testimonial/'.$unique_banner);
            @unlink('admin/image/testimonial/'.$request->old_banner);
        }else{
            $unique_banner = $request->old_banner;
        }

        $update->testi_banner = $unique_banner;
        $update->update();

        $notification = array(
            'message' => 'Testimonial Banner Updated Successfully',
            'type' => 'success'
        );

        return redirect()->route('show.testimonial')->with($notification);
    }

    public function editTestimonial($id){
        $edit = Testimonial::find($id);
        return view('admin.testimonial.edit_testimonial',compact('edit'));
    }


    public function updateTestimonial(Request $request,$id){
        $update = Testimonial::find($id);

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(50,50)->save('admin/image/testimonial/'.$unique_name);
            @unlink('admin/image/testimonial/'.$request->old_photo);

        }else{
            $unique_name = $request->old_photo;
        }

        $update->Quote = $request->quote;
        $update->username = $request->username;
        $update->designation = $request->designation;
        $update->user_photo = $unique_name;
        $update->created_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Testimonial Updated Successfully',
            'type' => 'success'
        );

        return redirect()->route('show.testimonial')->with($notification);

    }


    public function deleteTestimonial($id){
        $delete = Testimonial::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);
    }







}
