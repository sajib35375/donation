<?php

namespace App\Http\Controllers;

use App\Models\Bannerb;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class BlogController extends Controller
{
    public function tagShow(){
        $tags = Tag::latest()->get();
        return view('admin.blog.tags.tags',compact('tags'));
    }

    public function tagStore(Request $request){
        $this->validate($request,[
            'tag' => 'required'
        ]);

        Tag::insert([
            'tag_name' => $request->tag,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Tag Inserted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function tagEdit($id){
        $edit = Tag::find($id);
        return view('admin.blog.tags.tag_edit',compact('edit'));
    }

    public function tagUpdate(Request $request,$id){
        $update = Tag::find($id);

        $update->tag_name = $request->tag;
        $update->created_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Tag Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('show.tag')->with($notification);
    }

    public function tagDelete($id){
        $delete = Tag::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Tag Deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->route('show.tag')->with($notification);
    }

    public function statusActive($id){
        $active = Tag::find($id);
        $active->status = true;
        $active->update();

        $notification = array(
            'message' => 'Status Activated Successfully',
            'type' => 'warning'
        );
        return redirect()->route('show.tag')->with($notification);

    }

    public function statusInactive($id){
        $inactive = Tag::find($id);
        $inactive->status = false;
        $inactive->update();

        $notification = array(
            'message' => 'Status Inactivated Successfully',
            'type' => 'warning'
        );
        return redirect()->route('show.tag')->with($notification);
    }

    public function categoryShow(){
        $category = Category::latest()->get();
        return view('admin.blog.category.category',compact('category'));
    }

    public function categoryStore(Request $request){
        $this->validate($request,[
            'category' => 'required'
        ]);

        Category::insert([
            'category_name' => $request->category,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Category Added Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }


    public function categoryEdit($id){
        $edit = Category::find($id);
        return view('admin.blog.category.category_edit',compact('edit'));
    }

    public function categoryUpdate(Request $request,$id){
        $update = Category::find($id);
        $update->category_name = $request->category;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'type' => 'warning'
        );
        return redirect()->route('show.category')->with($notification);
    }

    public function categoryDelete($id){
        $delete = Category::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function categoryActive($id){
        $active = Category::find($id);
        $active->status = true;
        $active->update();

        $notification = array(
            'message' => 'Category Active Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function categoryInactive($id){
        $inactive = Category::find($id);
        $inactive->status = false;
        $inactive->update();

        $notification = array(
            'message' => 'Category Inactive Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }




    public function addPost(){
        $tags = Tag::where('status',true)->get();
        $categories = Category::where('status',true)->get();
        return view('admin.blog.blog',compact('tags','categories'));
    }
    public function addPostStore(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(868,256)->save('admin/image/blog/'.$unique_name);
        }
//        $tag_arr = [];
//        $cat_arr = [];
//        foreach($request->tag as $tag){
//            array_push($tag_arr,$tag);
//        }
//
//        foreach($request->category as $cat){
//            array_push($cat_arr,$cat);
//        }


        $post_data = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $unique_name,
        ]);

        $post_data->category()->attach($request->category);
        $post_data->tags()->attach($request->tag);

        $notification = array(
            'message' => 'Post Inserted Successfully',
            'type' => 'success'
        );
        return redirect()->route('post.show')->with($notification);

    }
    public function PostShow(){
        $posts = Post::with('tags','category')->get();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.blog.blogPost',compact('posts','tags','categories'));
    }

    public function postEdit($id){
        $edit_posts = Post::find($id);
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.blog.edit_blog',compact('edit_posts','tags','categories'));
    }


    public function postUpdate(Request $request,$id){
        $update = Post::find($id);

        $unique_name = '';
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(868,256)->save('admin/image/blog/'.$unique_name);
            @unlink('admin/image/blog/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }

//        update post

        $update->title = $request->title;
        $update->description = $request->description;
        $update->photo = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();


//        update tags

        $post_id = $update->id;
                 $tags = $request['tag'];
                 if (isset($tags)) {
                     $update->tags()->sync($tags);  //If one or more tags is selected associate blog to tagblog
                     }
                 else {
                     $update->tags()->detach(); //If no tags is selected remove exisiting role associated to a blogs
                     }



//           update category

        $post_id = $update->id;
        $categories = $request['category'];
        if (isset($categories)) {
            $update->category()->sync($categories);  //If one or more tags is selected associate blog to tagblog
        }
        else {
            $update->category()->detach(); //If no tags is selected remove exisiting role associated to a blogs
        }


//        message

        $notification = array(
            'message' => 'Post Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('post.show')->with($notification);
    }

    public function postDelete($id){
        $delete = Post::find($id);
        $delete->delete();


        $notification = array(
            'message' => 'Post Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function blogBannerLoad(){
        $edit = Bannerb::find(1);

        return view('admin.blog.blog_banner',compact('edit'));
    }

    public function blogBanner(Request $request){
        $this->validate($request,[
            'banner' => 'required'
        ]);

        if ($request->hasFile('banner')){
            $photo = $request->file('banner');
            $unique_name = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1920,266)->save('admin/image/blog/banner/'.$unique_name);

        }else{
            $unique_name = $request->old_photo;
        }

        $update = Bannerb::find(1);
        $update->photo = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Banner Image Updated Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }














}
