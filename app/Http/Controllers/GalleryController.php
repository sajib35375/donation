<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Gbanner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class GalleryController extends Controller
{
    public function showGallery(){
        $gallery = Gallery::all();
        return view('admin.gallery.gallery',compact('gallery'));
    }


    public function storeGallery(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'short_text' => 'required',
            'photo' => 'required',
        ]);

        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(400,300)->save('admin/image/gallery/'.$unique_name);
        }

        Gallery::insert([
            'title' => $request->title,
            'short_text' => $request->short_text,
            'photo' => $unique_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Gallery Image Inserted Successfully',
            'type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function editGallery($id){
        $edit = Gallery::find($id);
        return view('admin.gallery.edit_gallery',compact('edit'));
    }

    public function updateGallery(Request $request,$id){
        $update = Gallery::find($id);

        $unique_name = '';
        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(400,300)->save('admin/image/gallery/'.$unique_name);
            @unlink('admin/image/gallery/'.$request->old_photo);

        }else{
            $unique_name = $request->old_photo;
        }


        $update->title = $request->title;
        $update->short_text = $request->short_text;
        $update->photo = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();


        $notification = array(
            'message' => 'Gallery Image Updated Successfully',
            'type' => 'success',
        );

        return redirect()->route('show.gallery')->with($notification);

    }


    public function deleteGallery($id){
        $delete = Gallery::find($id);
        $delete->delete();
        @unlink('admin/image/gallery/'.$delete->photo);

        $notification = array(
            'message' => 'Gallery Image Deleted Successfully',
            'type' => 'success',
        );

        return redirect()->route('show.gallery')->with($notification);
    }

    public function galleryBanner(){
        $banner_img = Gbanner::find(1);
        return view('admin.gallery.gallery_banner',compact('banner_img'));
    }

    public function galleryBannerUpdate(Request $request){
        $banner_update = Gbanner::find(1);

        if ($request->hasFile('banner')){
            $image = $request->file('banner');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,266)->save('admin/image/gallery/'.$unique_name);

        }else{
            $unique_name = $request->old_banner;
        }

        $banner_update->gallery_banner = $unique_name;
        $banner_update->update();

        $notification = array(
            'message' => 'Gallery Image Updated Successfully',
            'type' => 'success',
        );

        return redirect()->back()->with($notification);
    }





}
