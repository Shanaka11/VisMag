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
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!--<link href="css/main.css" rel="stylesheet">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <script type="text/javascript" src="{{asset('js/actionbar.js')}}"></script>    
</head>
<body>
    <div id="app">
        <main class="py-4">
            <!-- SidePanel Visitor-->
            <div class="sidebar w3-bar-block w3-animate-left" style="display:none;z-index:3" id='visitorSidePan'>
                Visitor
            </div>                    
            <!-- SidePanel User-->
            <div class="sidebar w3-bar-block w3-animate-left" style="display:none;z-index:3" id='userSidePan'>
                <form action="#">
                    <label id="userEmail"></label><br>
                    <label for="userName">Name</label>
                    <input type="text" id="userName" name="name"><br><br>
                    <label for="userRole">User Role</label>
                    <input type="text" id="userRole" name="userrole"><br><br>
                    <input type="submit" value="Submit">
                </form>                
            </div> 
            <!-- Overlay -->
            <div class="w3-overlay w3-animate-opacity" onclick="sidePanClose()" style="cursor:pointer" id="myOverlay"></div>                       
            <div class="container-fluid padding">
                <div class="row text-center padding">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                        <i class="fas fa-code"></i>
                        <div class="container">

                            @guest
                                <a href="{{ route('login') }}">
                                    <button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">{{ __('Login') }}</button>
                                </a>                                        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        <button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">{{ __('Register') }}</button>                                        
                                    </a>
                                @endif
                            @else
                                <H1>{{ Auth::user()->name }}</H1>
                                <a href= "{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">{{ __('Logout') }}</button>
                                </a>                                                                                                                                          

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest                            
                        </div>
                        <hr>
                        <h3>Actions</h3>
                        <p>All the actions that a user can take, Actions change depending on the type of user</p>
                        <div class= "container">
                        <!--<div class="row jumbotron">-->
                            <!--<div class="col-xs-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">-->
                                <a href="/Visitor"><button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">View Visitors</button></a>
                            <!--</div>-->
                            <!--<div class="col-xs-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">-->
                                <a href="/Visitor/create"><button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width" id='creatVisitor' >New Visitor</button></a>
                            <!--</div>-->
                            <!--<div class="col-xs-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">-->
                                <a href="/Users"><button type="button" class="btn btn-outline-secondary btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">Show Users</button></a>
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
    @yield('script')
</body>
</html>
