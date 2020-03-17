<!DOCTYPE html>
<html>
    <head>
        <title> Visitor List </title>
        <!--<link rel="stylesheet" href={{asset('css/app.css')}}> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img class= "sh-brand" src="/img/logo_long.png" ></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href=#>Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- List -->
        <table class="table">
            <thead>
              <tr>
                <!-- Table Headers -->              
                <th scope="col">Name</th>
                <th scope="col">NIC</th>
                <th scope="col">Vehical No</th>
                <th scope="col">Date of Arrival</th>
                <th scope="col">Arrived</th>
              </tr>
            </thead>
            <tbody>
                <!-- Table Rows -->
                @if(count($visitors) > 0)
                    @foreach ($visitors as $visitor)
                        <tr>
                        <!-- <th scope="row">1</th> -->
                            <td>{{$visitor->name}}</td>
                            <td>{{$visitor->nic}}</td>
                            <td>{{$visitor->vehicle_no}}</td>
                            <td>{{$visitor->date_of_arrival}}</td>
                            <td>{{$visitor->arrived}}</td>
                            
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                </div>
                            </td>                           
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>        
    </body>
</html>