<!DOCTYPE html>
<html>

<head>
    <title>Posts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>
</head>
<body>

<div class="container">

    <div class="page-header">
        <h1>Posts</h1>
        <br>

        {{'Welcome , '.auth()->user()->name}}
        <br>
        {{  session()->get('Message') }}


    </div>

    <a href="{{url('/Post/create')}}">Create new Post</a> || <a href="{{url('/home')}}">Home</a> || <a href="{{url('logout')}}">Logout</a>

    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <th>ID</th>
            <th>Caption</th>
            <th>Image</th>
            <th>AddedBy</th>
            <th>action</th>
        </tr>

        @foreach ($data as $key => $raw)

            <tr>

                <td>{{  $raw->id }}</td>
                <td>{{  $raw->caption }}</td>
                <td> @if(!empty($raw->image)) <img src="{{url('/images/'.$raw->image)}}" alt="" width="50px"
                                                   height="50px"> @else {{ 'No Image'}} @endif </td>
                <td>{{  $raw->UserName }}</td>

                <td>

                    <a href='' data-toggle="modal" data-target="#modal_single_del{{$key}}"
                       class='btn btn-danger m-r-1em'>Remove</a>

                    <a href='{{url('/Post/'.$raw->id.'/edit')}}' class='btn btn-primary m-r-1em'>Edit</a>
                </td>
            </tr>

            <div class="modal" id="modal_single_del{{$key}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            Do you want to Remove {{$raw->caption}} post!!
                        </div>
                        <div class="modal-footer">
                            <form action="{{url('/Post/'.$raw->id)}}" method="post">
                                @csrf
                                @method('delete')

                                <div class="not-empty-record">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    @endforeach

    <!-- end table -->
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
