<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin');
    }
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "comment" => "required|max:200",
            "post_id" => "required"
        ]);

        $data['user_id'] = auth()->user()->id;
//        dd($data);
        $op = Comment::create($data);

        if ($op) {
            $Message = "Raw Inserted";
        } else {
            $Message = "Error Try Again";
        }
        session()->flash('Message', $Message);

        return redirect(url('/home'));
    }

    public function destroy($id)
    {
//        $data = Comment::find($id);
//        dd($id);
        $op = Comment::find($id)->delete();    // where('id',$id)
        if ($op) {
            $message = "Comment Removed";
        } else {
            $message = "Error Try Again";
        }
        session()->flash('Message', $message);
        return redirect(url('/home'));
    }
}
