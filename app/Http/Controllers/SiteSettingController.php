<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SiteSettingController extends Controller
{
    public function SiteSetting(){
        $edit_data = SiteSetting::find(1);
        return view('admin.settings.site_setting',compact('edit_data'));
    }

    public function SiteSettingUpdate(Request $request){
        $update_setting = SiteSetting::find(1);

        if ($request->hasFile('logo')){
            $logo = $request->file('logo');
            $unique_name = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
            Image::make($logo)->resize(169,75)->save('admin/image/logo/'.$unique_name);
            @unlink('admin/image/logo/'.$request->old_logo);
        }else{
            $unique_name = $request->old_logo;
        }


        $update_setting->phone = $request->phone;
        $update_setting->email = $request->email;
        $update_setting->logo = $unique_name;
        $update_setting->address = $request->address;
        $update_setting->text = $request->text;
        $update_setting->updated_at = Carbon::now();
        $update_setting->update();

        $notification = array(
            'message' => 'Settings Updated Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    //seo setting


    public function SeoSetting(){
        $edit_data = SeoSetting::find(1);
        return view('admin.settings.seo_setting',compact('edit_data'));
    }


    public function SeoSettingUpdate(Request $request){
        $update_data = SeoSetting::find(1);

        $update_data->meta_title = $request->meta_title;
        $update_data->meta_author = $request->meta_author;
        $update_data->meta_keyword = $request->meta_keyword;
        $update_data->meta_description = $request->meta_description;
        $update_data->google_analytics = $request->google_analytics;
        $update_data->update();

        $notification = array(
            'message' => 'Seo updated Successfully',
            'type' => 'success'
        );

        return redirect()->back()->with($notification);
    }











}
