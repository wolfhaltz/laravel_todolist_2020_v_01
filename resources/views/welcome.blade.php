<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TODO List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                color: white;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a:hover {
                text-decoration: line-through;
                text-decoration-color: red;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background-image: url('images/welcome_page_bg.png'); background-size: cover; background-position: center;">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md font_indie_flower">
                    TODO!
                </div>

                <div class="links">
                    <div>
                        <p class="font_arvo almost_gray_bg_to_texts">
                            How about organize your tasks? You can do it with our program!
                        </p>
                    </div>
                    @auth
                        <a href="{{ url('/home') }}" class="font_indie_flower almost_gray_bg_to_texts">Back to home!</a>
                    @else
                        <a href="{{ route('login') }}" class="font_indie_flower almost_gray_bg_to_texts">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font_indie_flower almost_gray_bg_to_texts">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

        <div class="bottom_left">
            <p class="credit">Credits of background image:</p>
            <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://pixabay.com/images/id-620817/" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from William Iven">
            <span style="display:inline-block;padding:2px 3px">William Iven</span>
            </a>
        </div>

    </body>
</html>
