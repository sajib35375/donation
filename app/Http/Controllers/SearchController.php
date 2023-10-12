<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Cause;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Header;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Sponsor;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchIndex(Request $request){
        $search = $request->search;
        $images = Slider::latest()->get();
        $about = About::where('title','LIKE',"%$search%")->get();
        $cause = Cause::where('title','LIKE',"%$search%")->get();
        $team = Team::where('title','LIKE',"%$search%")->get();
        $testimonial = Testimonial::where('Quote','LIKE',"%$search%")->get();
        $header = Header::where('main_title','LIKE',"%$search%")->first();
        $gallery = Gallery::where('title','LIKE',"%$search%")->get();
        $post = Post::where('title','LIKE',"%$search%")->get();
        $events = Event::where('title','LIKE',"%$search%")->paginate(3);
        return view('frontend.search.search',compact('about','post','events','cause','team','testimonial','header','gallery','images'));
    }
}
