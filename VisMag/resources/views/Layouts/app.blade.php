<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VisMAg</title>

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
<body class="c-action_back">
    <div id="app">
        <main class="padding-top">
            <!-- SidePanel Visitor-->
            <div class="sidebar w3-bar-block w3-animate-left" style="display:none;z-index:3" id='visitorSidePan'>
                {!! Form::open(['action' => 'VisitorsController@updateVisitor', 'method' => 'POST']) !!}
                    {{Form::label('visitorId', 'Id')}}<br>
                    {{Form::text('visitorId', '',['id=visitorId'])}}<br>                
                    {{Form::label('visitorName', 'Name')}}<br>
                    {{Form::text('visitorName', '',['id=visitorName'])}}<br>      
                    {{Form::label('visitorNic', 'NIC')}}<br>
                    {{Form::text('visitorNic', '',['id=visitorNic'])}}<br>  
                    {{Form::label('visitorVehicle', 'Vehicle No')}}<br>
                    {{Form::text('visitorVehicle', '',['id=visitorVehicle'])}}<br>    
                    {{Form::label('visitorDate', 'Date of Arrival')}}<br>
                    {{Form::Date('visitorDate', '',['id=visitorDate'])}}<br>                                         
                    {{Form::checkbox('visitorArrived', '1', false, ['id' =>'visitorArrived'])}}
                    {{Form::label('visitorArrived', 'Arrived')}}<br>
                    {{Form::checkbox('visitorApproved', '1', false, ['id' =>'visitorApproved'])}}
                    {{Form::label('visitorApproved', 'Approved')}}<br>                      
                    {{Form::Hidden('_method', 'PUT')}}              
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                                   
                {!! Form::close() !!} 
                {!! Form::Open(['action' => 'VisitorsController@removeVisitor', 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::label('visitorIdDel', 'Id')}}<br>
                    {{Form::text('visitorIdDel', '',['id=visitorIdDel'])}}<br>                     {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                {!! Form::Close() !!}                  
            </div>                    
            <!-- SidePanel User-->
            <div class="sidebar w3-bar-block w3-animate-left" style="display:none;z-index:3" id='userSidePan'>
                {!! Form::open(['action' => 'UserInfoController@updateRole', 'method' => 'POST']) !!}
                    {{Form::Text('userEmail', '', ['id=userEmail'])}}<br>
                    {{Form::label('userName', 'Name')}}<br>
                    {{Form::text('userName', '',['id=userName'])}}<br>      
                    {{Form::label('userRole', 'Role')}}<br>
                    {{Form::text('userRole', '',['id=userRole'])}}<br>  
                    {{Form::checkbox('userApproved', '1', false, ['id' =>'userApproved'])}}
                    {{Form::label('userApproved', 'Approved')}}<br> 
                    {{Form::Hidden('_method', 'PUT')}}              
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                                   
                {!! Form::close() !!}   
            </div> 
            <!-- Overlay -->
            <div class="w3-overlay w3-animate-opacity" onclick="sidePanClose()" style="cursor:pointer" id="myOverlay"></div>                       
            <div class="container-fluid padding">
                <div class="row text-center padding">
                    <div class="col-lg-2 c-action-bar">
                        <i class="fas fa-code"></i>
                        <div class="container">

                            @guest
                                <a href="{{ route('login') }}">
                                    <button type="button" class="btn c-action-btn btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">{{ __('Login') }}</button>
                                </a>                                        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        <button type="button" class="btn c-action-btn btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">{{ __('Register') }}</button>                                        
                                    </a>
                                @endif
                            @else
                                <p class="user c-action-header">{{ Auth::user()->name }}<p>
                                <p id="currUserRole" class="user c-action-subheader">{{ Auth::user()->getInfo(Auth::user()->email)}}</p>
                                <a href= "{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <button type="button" class="btn btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width c-action-btn">{{ __('Logout') }}</button>
                                </a>                                                                                                                                          

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest                            
                        </div>
                        <hr>
                        <div class= "container">
                            <a href="/Visitor"><button id="Visitor" type="button" class="btn c-action-btn btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">View Visitors</button></a>
                            <a href="/Visitor/create"><button id="CreateVisitor"type="button" class="btn c-action-btn btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width" id='creatVisitor' >New Visitor</button></a>
                            <a href="/Users"><button id="Users" type="button" class="btn c-action-btn btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">Show Users</button></a>
                            <a href="/"><button id="Home" type="button" class="btn c-action-btn btn-lg btn-act col-xs-3 col-sm-3 col-md-3 col-lg-12 responsive-width">Home</button></a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <i class="fas fa-bold"></i>
                        @yield('content')
                    </div>
                    <div class="col-lg-2 c-action-bar">
                        <i class="fab fa-css3"></i>
                        <h3 class="c-action-header">Notifications</h3>
                        <p class="c-action-subheader">Sends notifications to the relevent users depending on other users activities</p>
                        @include('inc.messages')
                    </div>				
                </div>
            </div>            
        </main>
    </div>
    @auth
        <script>
            checkActBarButtons();
        </script>
    @endauth
    @yield('script')
</body>
</html>
