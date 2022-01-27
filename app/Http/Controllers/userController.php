<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Following;
use App\Models\Post;
use App\Models\Users;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin', ['except' => ['create', 'store', 'login', 'doLogin']]);
    }

    public function index()
    {
        if (auth()->check()) {
            $users = Users::get();
            $data = Post::join('users', 'users.id', '=', 'posts.user_id')->orderBy('created_at', 'DESC')->select('posts.*', 'users.name as UserName', 'users.image as profile')->get();
            $comments = Comment::join('posts', 'posts.id', '=', 'comments.post_id')->join('users', 'users.id', '=', 'comments.user_id')->orderBy('created_at', 'DESC')->select('comments.*', 'users.name')->get();
            $followers = Following::join('users', 'users.id', '=', 'following.user_id')->select('following.following_id')->get();
//            dd($followers[0]);
            foreach ($followers as $key => $value) {
                $m[] = $value->following_id;
            }
//            dd($m);
//            dd($comments);
            return view('index', ['data' => $data, 'users' => $users, 'comments' => $comments, 'followers' => $m]);
        } else {
            return redirect(url('/login'));
        }
    }

    public function create()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
//        dd($request);
        $data = $this->validate($request, [
            "name" => "required",
            "username" => "required",
            "password" => "required|min:6|max:50",
            "email" => "required|email",
            "phone" => "required|numeric|digits:11",
            "image" => "required|image|mimes:png,jpg"
        ]);
//        dd($data);

        $data['password'] = bcrypt($data['password']);

        $FinalName = time() . rand() . '.' . $request->image->extension();

        if ($request->image->move(public_path('images'), $FinalName)) {

            $data['image'] = $FinalName;

//            dd($data);
            $op = Users::create($data);

            if ($op) {
                $Message = "User Inserted";
            } else {
                $Message = "Error Try Again";
            }
        } else {
            $Message = "Error In Uploading Try Again ";
        }

        session()->flash('Message', $Message);

        return redirect(url('/home'));

    }

    public function login()
    {
        return view('login');
    }

    //with email only
    public function doLogin(Request $request)
    {
        $data = $this->validate($request, [
            "email" => "required|email",
            "password" => "required|min:6|max:50",
        ]);

        if (auth()->attempt($data)) {
            return redirect(url('/home'));
        } else {
            $message = "Error in Email || password try Again";
            session()->flash('Message', $message);
            return redirect(url('/login'));
        }
    }

    public function edit($id)
    {
        $data = Users::where('id', $id)->get();

        //    $data =   Users::find($id);  dd($data->name);
//        dd($data);
        return view('edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            "name" => "required",
            "username" => "required",
            "email" => "required|email",
            "id" => "required|numeric",
            "phone" => "required|numeric|digits:11",
            "image" => "nullable|image|mimes:png,jpg",
        ]);
        $rawData = Users::find($data['id']);
//        dd($rawData);

        if (request()->hasFile('image')) {

            $FinalName = time() . rand() . '.' . $request->image->extension();

            if ($request->image->move(public_path('images'), $FinalName)) {
                unlink(public_path('images/' . $rawData->image));
            } else {
                $FinalName = $rawData->image;
            }
        } else {
            $FinalName = $rawData->image;
        }


        $data['image'] = $FinalName;

        $op = Users::where('id', $data['id'])->update($data);

        if ($op) {
            $Message = "Raw Updated";
        } else {
            $Message = "Error Try Again";
        }

        session()->flash('Message', $Message);

        return redirect(url('/home'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect(url('/login'));
    }

    public function destroy($id)
    {
        $data = Users::find($id);

        $op = Users::find($id)->delete();    // where('id',$id)

        if ($op) {
            unlink(public_path('images/' . $data->image));
            $Message = "Raw Removed";
        } else {
            $Message = "Error Try Again";
        }

        session()->flash('Message', $Message);
        return redirect(url('/User'));
    }

    public function follow($id)
    {

        $data['following_id'] = $id;
        $data['user_id'] = auth()->user()->id;
//        dd($data);
        $op = Following::create($data);

        if ($op) {
            $Message = "Raw Inserted";
        } else {
            $Message = "Error Try Again";
        }
        session()->flash('Message', $Message);

        return redirect(url('/home'));
    }

    public function unfollow($id)
    {
        $op = Following::where('following_id', $id)->delete();
//        $op = Following::find($id)->delete();

        if ($op) {
            $Message = "Raw Deleted";
        } else {
            $Message = "Error Try Again";
        }
        session()->flash('Message', $Message);

        return redirect(url('/home'));
    }
}
