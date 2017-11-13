<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            a.btn {
                color: #fff;
                padding: 10px;
                border-radius: 3px;
                margin: 10px
            }
            a.btn-google { background: #E26C24 }
            a.btn-google:hover { background: #CA631E }
            a.btn-facebook { background: #2486E2 }
            a.btn-facebook:hover { background: #1B6FBE }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel OAuth 2.0
                </div>

                <div class="links">
                    <a href="{{ route('social.facebook.login', ['provider' => 'facebook']) }}" class="btn btn-facebook">
                        Facebook
                    </a>
                    <a href="{{ route('social.facebook.login', ['provider' => 'google']) }}" class="btn btn-google">
                        Google
                    </a>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/gasparesganga-jquery-loading-overlay/src/loadingoverlay.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/index.js') }}"></script>
    </body>
</html>
