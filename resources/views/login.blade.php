<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <title>Login Instagram</title>
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

        {{  session()->get('Message') }}
        <form class="login-form" action="{{url('DoLogin')}}" method="post">
            @csrf
            <div class="field">
                <input name="email" type="email" placeholder="Phone number, username, or email" />
                <label for="username">Phone number, username, or email</label>
            </div>
            <div class="field">
                <input name="password" type="password" placeholder="password" />
                <label for="password">Password</label>
            </div>
            <button class="login-button" type="submit">Log In</button>
            <div class="separator">
                <div class="line"></div>
                <p>OR</p>
                <div class="line"></div>
            </div>
            <div class="other">
                <button class="fb-login-btn" type="submit">
                    <i class="fa fa-facebook-official fb-icon"></i>
                    <span class="">Log in with Facebook</span>
                </button>
                <a class="forgot-password" href="#">Forgot password?</a>
            </div>
        </form>
    </div>
    <div class="box">
        <p>Don't have an account? <a class="signup" href="{{url('signup')}}">Sign Up</a></p>
    </div>
</div>
