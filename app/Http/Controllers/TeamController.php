<?php

namespace App\Http\Controllers;

use App\Models\Bannert;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class TeamController extends Controller
{
    public function showTeam(){
        $team = Team::latest()->get();
        $edit = Bannert::find(1);
        return view('admin.team.team',compact('team','edit'));
    }

    public function storeTeam(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required',

        ]);

        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $unique_photo = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(270,270)->save('admin/image/team/'.$unique_photo);
        }
        if ($request->hasFile('location')){
            $photo = $request->file('location');
            $unique_location = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(270,270)->save('admin/image/team/'.$unique_location);
        }

        Team::insert([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $unique_photo,
            'location' => $unique_location,
            'designation' => $request->designation,
            'degree' => $request->degree,
            'language' => $request->language,
            'experience' => $request->experience,
            'hobbies' => $request->hobbies,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Team inserted Successfully',
            'type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editTeam($id){
        $edit = Team::find($id);
        return view('admin.team.team_edit',compact('edit'));
    }



    public function updateTeam(Request $request,$id){
        $update = Team::find($id);

        $unique_photo = '';
        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $unique_photo = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(270,270)->save('admin/image/team/'.$unique_photo);
            @unlink('admin/image/team/'.$request->old_photo);
        }else{
            $unique_photo = $request->old_photo;
        }

        $unique_location = '';
        if ($request->hasFile('location')){
            $location = $request->file('location');
            $unique_location = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($location)->resize(270,270)->save('admin/image/team/'.$unique_location);
            @unlink('admin/image/team/'.$request->old_location);
        }else{
            $unique_location = $request->old_location;
        }



        $update->name = $request->name;
        $update->title = $request->title;
        $update->description = $request->description;
        $update->photo = $unique_photo;
        $update->location = $unique_location;
        $update->designation = $request->designation;
        $update->degree = $request->degree;
        $update->language = $request->language;
        $update->experience = $request->experience;
        $update->hobbies = $request->hobbies;
        $update->updated_at = Carbon::now();
        $update->update();


        $notification = array(
            'message' => 'Team Updated Successfully',
            'type' => 'success',
        );
        return redirect()->route('show.team')->with($notification);

    }


    public function deleteTeam($id){
        $delete = Team::find($id);
        $delete->delete();
        @unlink('admin/image/team/'.$delete->photo);
        @unlink('admin/image/team/'.$delete->location);

        $notification = array(
            'message' => 'Team Deleted Successfully',
            'type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function bannerTeam(Request $request){
        $banner = Bannert::find(1);

        $unique_name = '';
        if ($request->hasFile('banner')){
            $img = $request->file('banner');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1920,266)->save('admin/image/team/'.$unique_name);
            @unlink('admin/image/team/'.$request->old_banner);
        }else{
            $unique_name = $request->old_banner;
        }

        $banner->banner = $unique_name;
        $banner->update();

        $notification = array(
            'message' => 'Banner Team Updated Successfully',
            'type' => 'success',
        );
        return redirect()->back()->with($notification);
    }



}
