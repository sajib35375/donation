<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function sliderShow(){
        $sliders = Slider::all();
        return view('admin.slider.slider',compact('sliders'));
    }

    public function sliderStore(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'short_title' => 'required',
            'photo' => 'required',
        ]);

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,850)->save('admin/image/slider/'.$unique_name);
        }



        Slider::insert([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'photo' => $unique_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function sliderEdit($id){
        $slider_edit = Slider::find($id);
        return view('admin.slider.slider_edit',compact('slider_edit'));
    }
    public function sliderUpdate(Request $request,$id){
        $slider_update = Slider::find($id);

        $unique_name = '';
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,850)->save('admin/image/slider/'.$unique_name);
            unlink('admin/image/slider/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }


        $slider_update->title = $request->title;
        $slider_update->short_title = $request->short_title;
        $slider_update->photo = $unique_name;
        $slider_update->update();

        $notification = array(
            'message' => 'Slider Updated Successfully',
            'type' => 'success',
        );
        return redirect()->route('slider.show')->with($notification);

    }

    public function sliderDelete($id){
        $slider_delete = Slider::find($id);
        $slider_delete->delete();
        unlink('admin/image/slider/'.$slider_delete->photo);
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }







}
