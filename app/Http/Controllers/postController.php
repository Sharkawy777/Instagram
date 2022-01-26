<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "caption" => "nullable|max:200",
            "image" => "required|image|mimes:png,jpg"
        ]);

        $FinalName = time() . rand() . '.' . $request->image->extension();

        if ($request->image->move(public_path('images'), $FinalName)) {

            $data['user_id'] = auth()->user()->id;
            $data['image'] = $FinalName;

//            dd($data);
            $op = Post::create($data);

            if ($op) {
                $Message = "Post Inserted";
            } else {
                $Message = "Error Try Again";
            }
        } else {
            $Message = "Error In Uploading Try Again ";
        }
        session()->flash('Message', $Message);

        return redirect(url('/Post'));

    }

    public function index()
    {
        $data = Post::join('users', 'users.id', '=', 'posts.user_id')->orderBy('updated_at', 'DESC')->select('posts.*', 'users.name as UserName')->get()->where('id', auth()->user()->id);
//        $data = Post::join('users', 'users.id', '=', 'posts.user_id')->orderBy('created_at', 'DESC')->select('posts.*', 'users.name as UserName')->get();
        return view('post.index', ['data' => $data]);
    }

    public function show($id)
    {
        dd('show method');
    }

    public function edit($id)
    {
        //
        $data = Post::find($id);

        return view('post.edit',['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request,[
            "caption"   => "required|max:200",
            "image"   => "nullable|image|mimes:png,jpg"
        ]);

        # Fetch Raw Data ....
        $rawData = post::find($id);


        if(request()->hasFile('image')){

            $FinalName = time().rand().'.'.$request->image->extension();

            if($request->image->move(public_path('images'),$FinalName)){

                unlink(public_path('images/'.$rawData->image));

            }else{
                $FinalName = $rawData->image;
            }

        }else{
            $FinalName = $rawData->image;
        }



        $data['image'] =  $FinalName;

        $op = post::where('id',$id)->update($data);

        if($op){
            $message = "Raw Updated";
        }else{
            $message = "Error Try Again";
        }

        session()->flash('Message',$message);
        return redirect(url('/Post'));
    }

    public function destroy($id)
    {
        $data = Post::find($id);

        $op = Post::find($id)->delete();    // where('id',$id)

        if ($op) {
            unlink(public_path('images/' . $data->image));
            $message = "Raw Removed";
        } else {
            $message = "Error Try Again";
        }
        session()->flash('Message', $message);
        return redirect(url('/Post'));
    }


}
