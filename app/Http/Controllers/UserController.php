<?php

namespace App\Http\Controllers;

use App\Models\Gbanner;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Cause;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Header;
use App\Models\Slider;
use App\Models\Bannerb;
use App\Models\Bannerc;
use App\Models\Bannere;
use App\Models\Bannert;
use App\Models\Gallery;
use App\Models\Sponsor;
use App\Models\Category;
use App\Models\Bannercount;
use App\Models\Testibanner;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Console\Scheduling\Schedule;

class UserController extends Controller
{


    public function cache(){

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




    public function index(){
        $images = Slider::latest()->get();
        $about = About::latest()->get();
        $header = Header::find(1);
        $cause = Cause::latest()->get();
        $cause_count = Cause::all()->count();
        $gallery = Gallery::all();
        $gallery_count = Gallery::all()->count();
        $team = Team::orderBy('id','ASC')->limit(4)->get();
        $team_count = Team::all()->count();
        $testimonial = Testimonial::latest()->get();
        $testi_banner = Testibanner::find(1);
        $event_count = Event::all()->count();
        $banner = Bannercount::find(1);
        $sponsor = Sponsor::all();
        return view('frontend.index',compact('images','sponsor','banner','event_count','gallery_count','team_count','cause_count','about','header','cause','gallery','team','testimonial','testi_banner'));
    }

    public function SingleAbout(){
        $about = About::latest()->get();
        $header = Header::find(1);
        $banner = Banner::find(1);
        return view('frontend.about.about_single',compact('banner','about','header'));
    }

    public function causeList(){
        $banner_img = Bannerc::find(1);
        $cause = Cause::latest()->paginate(4);
        $recent = Post::latest()->take(3)->get();
        return view('frontend.cause.cause_list',compact('banner_img','recent','cause'));
    }

    public function causeSingle($id){
       $cause_single = Cause::find($id);
       $banner = Bannerc::find(1);
       $recent = Post::latest()->take(3)->get();
       $next_prev = Post::latest()->take(2)->get();
       $event_gall = Event::latest()->get();
        return view('frontend.cause.cause_single',compact('cause_single','event_gall','next_prev','recent','banner'));
    }

    public function teamPage(){
        $team = Team::all();
        $banner = Bannert::find(1);
        $recent = Post::latest()->take(3)->get();
        $gallery = Gallery::all();
        return view('frontend.team.team',compact('team','banner','recent','gallery'));
    }


    public function teamSingle($id){
        $team = Team::find($id);
        $banner = Bannert::find(1);
        $recent = Post::latest()->take(3)->get();
        $gallery = Gallery::all();
        return view('frontend.team.team_single',compact('team','banner','recent','gallery'));
    }

    public function blogShow(){
        $post = Post::latest()->paginate(3);
        $banner = Bannerb::find(1);
        $category = Category::all();
        $recent = Post::latest()->take(3)->get();
        $gallery = Gallery::all();
        return view('frontend.blog.blog',compact('post','banner','category','recent','gallery'));
    }

    public function blogSingle($id){
        $single = Post::find($id);
        $banner = Bannerb::find(1);
        $category = Category::all();
        $tag = Tag::latest()->take(3)->get();
        $next_prev = Post::latest()->take(2)->get();
        $recent = Post::latest()->take(3)->get();
        $gallery = Gallery::all();
        return view('frontend.blog.blog_single',compact('single','banner','category','tag','next_prev','recent','gallery'));
    }

    public function eventShow(){
        $banner = Bannere::find(1);
        $events = Event::latest()->paginate(3);
        $event_update = Event::latest()->pluck('id')->toArray();
        return view('frontend.event.event',compact('events','banner','event_update'));
    }


    public function singleEvent($id){
        $single = Event::find($id);
        $banner = Bannere::find(1);
        $all = Event::latest()->get();
        $recent = Post::latest()->take(3)->get();
        $next_prev = Post::latest()->take(2)->get();

        

//        if ($single->countdown < Carbon::now()){
//
//            $single->button_text = 'CANCEL';
//            $single->button_color = '#ed6642';
//            $single->update();
//
//        }elseif($single->countdown > Carbon::now()){
//
//            $single->button_text = 'UPCOMING';
//            $single->button_color = '#edb542';
//            $single->update();
//
//        }elseif( $single->button_text = 'FREE' && $single->countdown < Carbon::now() ){
//            $single->button_text = 'CANCEL';
//            $single->button_color = '#ed6642';
//            $single->update();
//
//
//        }

        return view('frontend.event.single_event',compact('single','banner','all','recent','next_prev'));
    }



    public function catSearch($id){
        $category_search = Category::find($id);
        $category = Category::latest()->get();
        $post = Post::where('title','LIKE',"%$category_search%")->get();
        $banner = Bannerb::find(1);

        $recent = Post::latest()->take(3)->get();
        $gallery = Gallery::all();

        return view('frontend.blog.cat_search',compact('post','category_search','banner','recent','gallery','category'));
    }

//public function countUpdate(Request $request){

//        dd($request->event_id);
   
//    $arr = [];
//         foreach($request->event_id as $event_id){
//             array_push($arr,$event_id);
//         }


//$arr= explode(',',$request->event_id);

//dd($arr);

//        foreach($arr as $id) {
//
//            $single = Event::where('id', $id)->get();
//
//
//            for ($i = 0; $i < count($single); $i++) {
//
//
//                if ($single[$i]->countdown < Carbon::now()) {
//
//                    $single[$i]->button_text = 'CANCEL';
//                    $single[$i]->button_color = '#ed6642';
//                    $single[$i]->update();
//
//                } elseif ($single[$i]->countdown > Carbon::now()) {
//
//                    $single[$i]->button_text = 'UPCOMING';
//                    $single[$i]->button_color = '#edb542';
//                    $single[$i]->update();
//
//                }elseif( $single[$i]->button_text = 'FREE' && $single[$i]->countdown < Carbon::now() ){
//
//                    $single->button_text = 'CANCEL';
//                    $single->button_color = '#ed6642';
//                    $single->update();
//                }
//
//
//            }
//
//        }

//        return redirect()->back();
//
//   }

   public function downloadPoster($poster){
        return response()->download('admin/image/event/'.$poster);
   }


    public function galleryPage(){
        $gallery = Gallery::latest()->paginate(8);
        $gbanner = Gbanner::find(1);
        return view('frontend.gallery.gallery',compact('gallery','gbanner'));
    }




    
}










