<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Header;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AboutController extends Controller
{
    public function aboutCrud(){
        $all = About::all();
        $header = Header::find(1);
        $banner = Banner::find(1);
        return view('admin.about.help',compact('all','header','banner'));
    }

    public function aboutStore(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'short_des' => 'required',
            'icon' => 'required',
        ]);

        About::insert([
            'title' => strtoupper($request->title),
            'short_des' => $request->short_des,
            'icon' => $request->icon,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Help Post is Submit',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function aboutEdit($id){
        $edit = About::find($id);
        return view('admin.about.about_edit',compact('edit'));
    }

    public function aboutUpdate(Request $request,$id){
        $update = About::find($id);
        $update->title = strtoupper($request->title);
        $update->short_des = $request->short_des;
        $update->icon = $request->icon;
        $update->update();

        $notification = array(
            'message' => 'Your Help Post is Updated',
            'type' => 'success'
        );

        return redirect()->route('about')->with($notification);
    }

    public function SingleAboutBanner(Request $request){
        $update_banner = Banner::find(1);

        if ($request->hasFile('banner')){
            $image = $request->file('banner');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,266)->save('admin/image/about/'.$unique_name);
        }else{
            $unique_name = $request->old_banner;
        }

        $update_banner->banner = $unique_name;
        $update_banner->update();


        $notification = array(
            'message' => 'Banner Image is Updated',
            'type' => 'success'
        );

        return redirect()->route('about')->with($notification);


    }


    public function aboutDelete($id){
        $delete = About::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Banner Image is Deleted',
            'type' => 'warning'
        );

        return redirect()->route('about')->with($notification);
    }





    public function headerUpdate(Request $request){
            $update_header = Header::find(1);
            $update_header->main_title = strtoupper($request->main_title);
            $update_header->main_short_des = $request->main_short_des;
            $update_header->updated_at = Carbon::now();
            $update_header->update();

        $notification = array(
            'message' => 'Your Help Post is Updated',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
















}
