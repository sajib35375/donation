<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
//    frontend
    public function commentStore(Request $request){
        $this->validate($request,[
            'comment' => 'required'
        ]);

        Comment::insert([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Comment Inserted Successfully');
    }

    public function replyStore(Request $request){
        $this->validate($request,[
            'reply' => 'required'
        ]);

        Reply::insert([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id,
            'reply' => $request->reply,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','Reply Inserted Successfully');
    }

    //backend

    public function postComment(){
        $comments = Comment::latest()->get();
        return view('admin.comments.comment',compact('comments'));
    }


    public function statusApprove($id){
        $status = Comment::find($id);
        if ($status->status==false){
            $status->status=true;
        }else{
            $status->status=false;
        }
        $status->update();

        $notification = array(
            'message' => 'status updated successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function commentDelete($id){
        $delete = Comment::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Comment Deleted successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function postReply(){
        $replies = Reply::all();
        return view('admin.comments.reply',compact('replies'));
    }

    public function replyStatusUpdate($id){
        $reply = Reply::find($id);
        if ($reply->status==true){
            $reply->status = false;
        }else{
            $reply->status = true;
        }
        $reply->update();

        $notification = array(
            'message' => 'Reply Updated successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function replyDelete($id){
        $delete = Reply::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Reply Deleted successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }




}
