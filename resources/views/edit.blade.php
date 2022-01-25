<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account Instagram</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
</head>

<div class="container">
    <div class="box">
        <div class="heading"></div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="login-form" method="post" action="{{url('update')}}">
            @csrf
            <input type="hidden" name="id" value="{{$data[0]->id}}">
            <div class="field">
                <input name="name" type="text" placeholder="Name" value="{{$data[0]->name}}"/>
                <label for="name">Name</label>
            </div>

            <div class="field">
                <input name="username" type="text" placeholder="Username" value="{{$data[0]->username}}"/>
                <label for="username">Username</label>
            </div>

            <div class="field">
                <input name="email" type="email" placeholder="email" value="{{$data[0]->email}}"/>
                <label for="email">Email</label>
            </div>

            <div class="field">
                <input name="phone" type="text" placeholder="Phone Number" value="{{$data[0]->phone}}"/>
                <label for="phone">Phone Number</label>
            </div>

            <button class="login-button" type="submit">Save Changes</button>

        </form>
    </div>
</div>
