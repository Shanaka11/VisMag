<!doctype html>
<html>
    <head>
        <title> Test </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!--<link href="css/main.css" rel="stylesheet">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <script type="text/javascript" src="{{asset('js/actionbar.js')}}"></script>
    </head>

    <body>
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
    </body>
</html>