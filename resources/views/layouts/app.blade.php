<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/styles/a11y-dark.min.css"
    integrity="sha512-1rzCaYWsg3l6uKvGbUT6rAZFOcVn0zeXAFlZudsnj8k2xcrU5asL8jfJUEijV9GPYMh0GnPToeCTJj6RXQnA8g=="
    crossorigin="anonymous"/>    
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div id="app">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif






        <main class="py-4">
            @if (Auth::check())
            <div class="container">
            <div class="row">
                <div class="col-sm-4">
                <a href="{{route('discussions.create')}}" class="form-control btn btn-primary">Create a new discussion</a>
                <br>
                </br>
                <div class="card">
                        
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                <a href="/forum" style="text-decoration: none;">Home</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/forum?filter=me" style="text-decoration: none;">My discussions</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/forum?filter=solved" style="text-decoration: none;">Answered  discussions</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/forum?filter=unsolved" style="text-decoration: none;">Not Answered discussions</a>
                                            </li>
                            </ul>
                        </div>
                    </div>

                    
                    @if (Auth::user()->admin)
                    <div class="card">
                        
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                <a href="/channels" style="text-decoration: none;">All Channels</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    @endif
                        
                    
                    <div class="card">
                        <div class="card-header">Channels</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($channels as $channel)
                                <li class="list-group-item"><a href="{{route('channel',['slug' => $channel->slug ])}}"  style="text-decoration: none;">{{$channel->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-8">
                    @yield('content')
                </div>
                </div>
            </div>
    </main>
    
 </div>
 <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/highlight.min.js"
    integrity="sha512-d00ajEME7cZhepRqSIVsQVGDJBdZlfHyQLNC6tZXYKTG7iwcF8nhlFuppanz8hYgXr8VvlfKh4gLC25ud3c90A=="
    crossorigin="anonymous"></script>
    <script>hljs.highlightAll();</script>

</body>

</html>