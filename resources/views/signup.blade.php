<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Instagram</title>
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

        <form class="login-form" method="post" action="{{url('register')}}">
            @csrf
            <div class="field">
                <input name="name" type="text" placeholder="Name"/>
                <label for="name">Name</label>
            </div>

            <div class="field">
                <input name="username" type="text" placeholder="Username"/>
                <label for="username">Username</label>
            </div>

            <div class="field">
                <input name="email" type="email" placeholder="email"/>
                <label for="email">Email</label>
            </div>

            <div class="field">
                <input name="password" type="password" placeholder="password"/>
                <label for="password">Password</label>
            </div>


            <div class="field">
                <input name="phone" type="text" placeholder="Phone Number"/>
                <label for="phone">Phone Number</label>
            </div>

            <button class="login-button" type="submit">Signup</button>

            <div class="separator">
                <div class="line"></div>
                <p>OR</p>
                <div class="line"></div>
            </div>
            <div class="other">
                <button class="fb-login-btn" type="button">
                    <i class="fa fa-facebook-official fb-icon"></i>
                    <span class="">Signup with Facebook</span>
                </button>

            </div>
        </form>
    </div>
</div>
