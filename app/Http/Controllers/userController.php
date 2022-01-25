<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function index()
    {
        if (auth()->check()) {
            $data = Users::get();
            return view('index', ['data' => $data]);
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
        $data = $this->validate($request, [
            "name" => "required",
            "username" => "required",
            "password" => "required|min:6|max:50",
            "email" => "required|email",
            "phone" => "required|numeric|digits:11",
        ]);
//        dd($data);

        $data['password'] = bcrypt($data['password']);

        $op = Users::create($data);

        if ($op) {
            $Message = "Raw Inserted";
        } else {
            $Message = "Error Try Again";
        }

        session()->flash('Message', $Message);

        return redirect(url('/home'));

    }

    public function login()
    {
        return view('login');
    }

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
        ]);

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

        $op = Users::where('id', $id)->delete();

        if ($op) {
            $Message = "Raw Removed";
        } else {
            $Message = "Error Try Again";
        }

        session()->flash('Message', $Message);

        return redirect(url('/User'));
    }

}
