<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VisMag') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!--<link href="css/main.css" rel="stylesheet">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <script type="text/javascript" src="{{asset('js/actionbar.js')}}"></script>    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid padding">
                <div class="row text-center padding">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                        <i class="fas fa-code"></i>
                        <h3>Actions</h3>
                        <p>All the actions that a user can take, Actions change depending on the type of user</p>
                        <div class= "container">
                        <!--<div class="row jumbotron">-->
                            <!--<div class="col-xs-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">-->
                                <a href="/Visitor/create"><button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">View Visitors</button></a>
                            <!--</div>-->
                            <!--<div class="col-xs-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">-->
                                <a href="/Visitor/create"><button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width" id='creatVisitor' >New Visitor</button></a>
                            <!--</div>-->
                            <!--<div class="col-xs-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">-->
                                <a href="/#"><button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">Add User</button></a>
                            <!--</div>-->                        
                            <!--<div class="col-xs-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">-->
                                <a href="/#"><button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">Approve</button></a>
                            <!--</div>-->                 
                        <!--</div>-->
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <i class="fas fa-bold"></i>
                        @yield('content')
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2">
                        <i class="fab fa-css3"></i>
                        <h3>Notifications</h3>
                        <p>Sends notifications to the relevent users depending on other users activities</p>
                    </div>				
                </div>
            </div>            
        </main>
    </div>
</body>
</html>
