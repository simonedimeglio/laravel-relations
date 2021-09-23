<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creative Press - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <header>
            <nav>
                <div class="container-fluid">
                    <div class="left-nav">
                        <ul>
                            <li><a href="{{ url('/') }}">HOME</a></li>
                            <li><a href="{{ route('articles.create')}}">WRITE</a></li>
                            <li><a href="{{ route('articles.index') }}">ARTICLES</a></li>
                        </ul>
                    </div>
                    <div class="center-nav">CREATIVE PRESS</div>
                    <div class="right-nav"><a href="/egg">THE CRAFTSMAN BUILDER</a></div>
                </div>
            </nav>
        </header>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer>
            <div class="container">
                <div class="footer-txt">
                    <div>#CREATIVEPRESS</div>
                    <div>&race;</div>
                    <div>Made with <span class="heart">&hearts;</span> by <a href="https://github.com/simonedimeglio">Simone Di Meglio</a>. All rights reserved - #creativepress &copy;</div>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>