<?php

namespace App\Http\Controllers;

use App\Models\Bannercount;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class CountSponsorController extends Controller
{
    public function bannerCount(){
        $edit = Bannercount::find(1);
        return view('admin.count_banner.count_banner',compact('edit'));
    }

    public function bannerCountUpdate(Request $request){
        $update = Bannercount::find(1);

        if ($request->hasFile('banner')){
            $image = $request->file('banner');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1200)->save('admin/image/count/'.$unique_name);
            @unlink('admin/image/count/'.$request->old_banner);

        }else{
            $unique_name = $request->old_banner;
        }

        $update->banner = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Banner Image Updated Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function allSponsor(){
        $all = Sponsor::latest()->get();
        return view('admin.sponsor.sponsor',compact('all'));
    }

    public function SponsorStore(Request $request){
        $this->validate($request,[
            'photo' => 'required',
        ]);

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(165,80)->save('admin/image/sponsor/'.$unique_name);
        }
        Sponsor::insert([
            'photo' => $unique_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sponsor Image Upload Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function SponsorEdit($id){
        $edit = Sponsor::find($id);

        return view('admin.sponsor.sponsor_edit',compact('edit'));
    }

    public function SponsorUpdate(Request $request,$id){
        $update = Sponsor::find($id);

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(165,80)->save('admin/image/sponsor/'.$unique_name);
            @unlink('admin/image/sponsor/'.$request->old_img);
        }else{
            $unique_name = $request->old_img;
        }

        $update->photo = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Sponsor Image Upload Successfully',
            'type' => 'success'
        );

        return redirect()->route('all.sponsor')->with($notification);
    }


    public function SponsorDelete($id){
        $delete = Sponsor::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Sponsor Image Deleted Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);
    }





}
