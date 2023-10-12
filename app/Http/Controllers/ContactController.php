<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use Image;

class ContactController extends Controller
{
    public function contactUs(){
        $contact = Contact::find(1);
        $sponsor = Sponsor::all();
        return view('frontend.contact.contact_us',compact('contact','sponsor'));
    }

    public function sendEmail(Request $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg,
        ];
        Mail::to('contactus.satyenboseclub@gmail.com')->send(new ContactMail($details));


        return redirect()->back()->with('success','Message Send Successfully');
    }




    public function contact(){
        $edit = Contact::find(1);
        return view('admin.contact.contact',compact('edit'));
    }
    public function contactUpdate(Request $request){
        $unique_name = '';
        if ($request->hasFile('banner')){
            $photo = $request->file('banner');
            $unique_name = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1920,266)->save('admin/image/contact/'.$unique_name);

        }else{
            $unique_name = $request->old_photo;
        }
        $update = Contact::find(1);
        $update->google_map_link = $request->map_link;
        $update->banner_image = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Contact page Updated Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
