<?php

namespace App\Http\Controllers;

use App\Models\Bannere;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Image;

class EventController extends Controller
{

    public function cacheClear(){

        try {
            Artisan::call('optimize:clear');
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('view:cache');
            return redirect() -> back() -> with('success' , 'Clear Cache Successfully');


        } catch (\Throwable $th) {
            return redirect() -> back() -> with('error' , $th);
        }


    }



    public function addEvent(){
        return view('admin.event.event');
    }

    public function addEventStore(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'quote' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'Address' => 'required',
            'timing' => 'required',
            'countdown' => 'required',
        ]);

        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(580,348)->save('admin/image/event/'.$unique_name);
        }
        $unique_poster = '';
        if ($request->hasFile('poster')){
            $poster = $request->file('poster');
            $unique_poster = hexdec(uniqid()).'.'.$poster->getClientOriginalExtension();
            Image::make($poster)->resize(880,548)->save('admin/image/event/'.$unique_poster);
        }

        Event::insert([
            'title' => $request->title,
            'quote' => $request->quote,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'photo' => $unique_name,
            'poster' => $unique_poster,
            'Address' => $request->Address,
            'timing' => $request->timing,
            'countdown' => $request->countdown,
            'timer' => $request->timer,
            'google_map' => $request->google_map,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Event Added Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function showEvent(){
        $event = Event::latest()->get();
        return view('admin.event.all_event',compact('event'));
    }

    public function eventEdit($id){
        $edit = Event::find($id);
        return view('admin.event.event_edit',compact('edit'));
    }


    public function eventUpdate(Request $request,$id){
        $update = Event::find($id);

        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(580,348)->save('admin/image/event/'.$unique_name);
            @unlink('admin/image/event/'.$request->old_photo);

        }else{
            $unique_name = $request->old_photo;
        }

        $unique_poster = '';
        if ($request->hasFile('poster')){
            $poster = $request->file('poster');
            $unique_poster = hexdec(uniqid()).'.'.$poster->getClientOriginalExtension();
            Image::make($poster)->resize(580,348)->save('admin/image/event/'.$unique_poster);
            @unlink('admin/image/event/'.$request->old_poster);

        }else{
            $unique_poster = $request->old_poster;
        }

        $update->title = $request->title;
        $update->description = $request->description;
        $update->quote = $request->quote;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->Address = $request->Address;
        $update->google_map = $request->google_map;
        $update->timing = $request->timing;
        $update->photo = $unique_name;
        $update->poster = $unique_poster;
        $update->countdown = $request->countdown;
        $update->timer = $request->timer;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Event Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('show.event')->with($notification);

    }

    public function eventDelete($id){
        $delete = Event::find($id);
        $delete->delete();
        @unlink('admin/image/event/'.$delete->photo);

        $notification = array(
            'message' => 'Event Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function eventBanner(){
        $edit = Bannere::find(1);
        return view('admin.event.event_banner',compact('edit'));
    }



    public function eventBannerUpdate(Request $request){
        $update = Bannere::find(1);


        if ($request->hasFile('banner')){
            $photo = $request->file('banner');
            $unique_name = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1920,266)->save('admin/image/event/'.$unique_name);
            @unlink('admin/image/event/'.$request->old_banner);

        }else{
            $unique_name = $request->old_banner;
        }

        $update->banner = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Event Updated Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }





}
