<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Instagram</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar">
    <div class="nav-wrapper">
        <img src="./img/logo.PNG" class="brand-img" alt="">
        <input type="text" class="search-box" placeholder="search">
        <div class="nav-items">
            <img src="./img/home.PNG" class="icon" alt="">
            <img src="./img/messenger.PNG" class="icon" alt="">
            <img src="./img/add.PNG" class="icon" alt="">
            <img src="./img/explore.PNG" class="icon" alt="">
            <img src="./img/like.PNG" class="icon" alt="">
            <a class="btn btn-danger" href="{{url('logout')}}">Logout</a>
            <div class="icon user-profile"></div>
        </div>
    </div>
</nav>

<section class="main">
    <div class="wrapper">
        <div class="left-col">
            <div class="status-wrapper">
                @foreach($users as $key => $value)
                    <div class="status-card">
                        <div class="profile-pic"><img src="{{url('images/'.$value->image)}}" alt=""></div>
{{--                        <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>--}}
                        <p class="username">{{substr($value->name,0,14)}}</p>
                    </div>
                @endforeach
                {{--                <div class="status-card">
                                    <div class="profile-pic"><img src="img/cover 2.png" alt=""></div>
                                    <p class="username">user_name_2</p>
                                </div>
                                <div class="status-card">
                                    <div class="profile-pic"><img src="img/cover 2.png" alt=""></div>
                                    <p class="username">user_name_3</p>
                                </div>
                                <div class="status-card">
                                    <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>
                                    <p class="username">user_name_5</p>
                                </div>
                                <div class="status-card">
                                    <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>
                                    <p class="username">user_name_6</p>
                                </div>
                                <div class="status-card">
                                    <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>
                                    <p class="username">user_name_7</p>
                                </div>
                                <div class="status-card">
                                    <div class="profile-pic"><img src="img/cover 3.png" alt=""></div>
                                    <p class="username">user_name_3</p>
                                </div>--}}

            </div>

            <div class="wrapper">
                <div class="left-col">

                    @foreach ($data as $key => $raw)
                        @if(in_array($raw->user_id,$followers) or $raw->user_id==auth()->user()->id)
                            <div class="post">
                                <div class="info">
                                    <div class="user">
                                        <div class="profile-pic"><img src="{{url('images/'.$raw->profile)}}" alt="">
                                        </div>
                                        <p class="username">{{$raw->UserName}}</p>
                                    </div>
                                    <img src="img/option.PNG" class="options" alt="">
                                </div>
                                <img src="{{url('images/'.$raw->image)}}" class="post-image" alt="">
                                <div class="post-content">
                                    <div class="reaction-wrapper">
                                        <img src="img/like.PNG" class="icon" alt="">
                                        <img src="img/comment.PNG" class="icon" alt="">
                                        <img src="img/send.PNG" class="icon" alt="">
                                        <img src="img/save.PNG" class="save icon" alt="">
                                    </div>
                                    <p class="likes">1,012 likes</p>
                                    <p class="description"><span>{{$raw->UserName}} </span>{{$raw->caption}}</p>
                                    <p class="post-time">{{$raw->created_at}}</p>

                                    @foreach($comments as $comment)
                                        @if($comment->post_id == $raw->id)
                                            <p class="description"><span>{{$comment->name}} </span>{{$comment->comment}}
                                                <br>{{$comment->updated_at}}</p>
                                            @if($comment->user_id == auth()->user()->id)
                                                <a href='' data-toggle="modal" data-target="#modal_single_del{{$key}}"
                                                   class=''>Remove</a>
                                                <div class="modal" id="modal_single_del{{$key}}" tabindex="-1"
                                                     role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                Remove {{$comment->comment}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{url('comment/'.$comment->id.'/remove')}}"
                                                                    method="post">
                                                                    @csrf
                                                                    {{--                                                                @method('delete')--}}

                                                                    <div class="not-empty-record">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Delete
                                                                        </button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">close
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>


                                <form method="post" action="{{url('comment/'.$raw->id)}}">
                                    @csrf
                                    <input type="hidden" value="{{$raw->id}}" name="post_id">
                                    <div class="comment-wrapper">
                                        <img src="img/smile.PNG" class="icon" alt="">
                                        <input type="text" class="comment-box" placeholder="Add a comment"
                                               name="comment">
                                        <button class="comment-btn">post</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

        <div class="wrapper">
            <div class="right-col">
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="{{url('images/'.auth()->user()->image)}}" alt="">

                    </div>
                    <div>
                        <p class="username">{{auth()->user()->name}}</p>
                    </div>
                    <a class="btn btn-action" href="{{url('edit/'.auth()->user()->id)}}">Update profile</a>
                </div>
                <a class="btn btn-action" href="{{url('Post/')}}">My Profile</a>
                <a class="btn btn-action" href="{{url('Post/create')}}">Create New Post</a>
                <p class="suggestion-text">Followers and Following</p>
{{--                <p class="suggestion-text">Suggestions for you</p>--}}

                @foreach($users as $key => $value)
                    @if($value->id != auth()->user()->id)
                        <div class="profile-card">
                            <div class="profile-pic">
                                <img src="{{url('images/'.$value->image)}}" alt="">
                            </div>
                            <div>
                                <p class="username">{{$value->name}}</p>
                                <p class="sub-text">{{$value->username}}</p>
                            </div>
                            @if(in_array($value->id,$followers))
                                <a href="{{url('unfollow/'.$value->id)}}" class="btn action-btn">unfollow</a>
                            @else
                                <a href="{{url('follow/'.$value->id)}}" class="btn action-btn">follow</a>

                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

</body>
</html>
