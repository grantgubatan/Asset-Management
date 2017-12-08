<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<<<<<<< HEAD
        <title>Asset Management</title>
=======
        <title>Laravel</title>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body
            {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            .full-height
            {
                height: 100vh;
            }
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            .flex-center
            {
                align-items: center;
                display: flex;
                justify-content: center;
            }
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            .position-ref
            {
                position: relative;
            }
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            .top-right
            {
                position: absolute;
                right: 10px;
                top: 18px;
            }
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            .content
            {
                text-align: center;
            }
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            .title
            {
                font-size: 84px;
            }
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            .links > a
            {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            .m-b-md
            {
                margin-bottom: 30px;
            }
            img
            {
                width: 100%;
                padding: 0;
                display: inline-block;
                margin: 0 auto;
                vertical-align: middle;
                max-width: 203px;
                max-height: 65%;
                border: 0;
                z-index: 9999;
                padding-top: 50px;
                margin-left: 100px;
                position: absolute;
<<<<<<< HEAD
=======

>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            }
        </style>
    </head>
    <body>
      <img src="{{ url('/') }}/ingram.png" alt="">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
<<<<<<< HEAD

=======
                        <a href="{{ url('/register') }}">Register</a>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Asset Management
                </div>
                <h1>LOCAL IS</h1>
            </div>
        </div>
    </body>
</html>
