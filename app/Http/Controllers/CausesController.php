<?php

namespace App\Http\Controllers;

use App\Models\Bannerc;
use App\Models\Cause;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class CausesController extends Controller
{
    public function showCauses(){
        $cause = Cause::latest()->get();
        $edit_banner = Bannerc::find(1);
        return view('admin.cause.causes',compact('cause','edit_banner'));
    }

    public function storeCauses(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'raised' => 'required',
            'goal' => 'required',
            'photo' => 'required',
        ]);

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,181)->save('admin/image/causes/'.$unique_name);
        }

        $percentage = ($request->raised/$request->goal)*100;

        Cause::insert([
            'title' => $request->title,
            'Description' => $request->description,
            'raised' => $request->raised,
            'goal' => $request->goal,
            'percentage' => $percentage,
            'photo' => $unique_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cause Inserted Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function editCauses($id){
        $edit = Cause::find($id);
        return view('admin.cause.cause_edit',compact('edit'));
    }


    public function updateCauses(Request $request,$id){
        $update = Cause::find($id);

        $unique_name = '';
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,181)->save('admin/image/causes/'.$unique_name);
            @unlink('admin/image/causes/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }

        $percentage = ($request->raised/$request->goal)*100;

        $update->title = $request->title;
        $update->Description = $request->description;
        $update->raised = $request->raised;
        $update->goal = $request->goal;
        $update->percentage = $percentage;
        $update->photo = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();



        $notification = array(
            'message' => 'Cause Updated Successfully',
            'type' => 'success'
        );

        return redirect()->route('show.causes')->with($notification);




    }

    public function deleteCauses($id){
        $delete = Cause::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Cause Deleted Successfully',
            'type' => 'success'
        );

        return redirect()->route('show.causes')->with($notification);
    }


    public function causeBannerUpdate(Request $request){
         $update_banner = Bannerc::find(1);

        $unique_name = '';
         if ($request->hasFile('banner_img')){
             $image = $request->file('banner_img');
             $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(1920,266)->save('admin/image/causes/banner/'.$unique_name);
             @unlink('admin/image/causes/banner/'.$request->old_banner);
         }else{
             $unique_name = $request->old_banner;
         }


         $update_banner->banner = $unique_name;
         $update_banner->update();


        $notification = array(
            'message' => 'Cause Updated Successfully',
            'type' => 'success'
        );

        return redirect()->route('show.causes')->with($notification);

    }







}
