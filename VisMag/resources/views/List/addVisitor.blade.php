<html>
    <head>
        <title> Visitor List </title>
        <!--<link rel="stylesheet" href={{asset('css/app.css')}}> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <H1>Add Visitor</H1>
        @include('inc.messages');
        {!! Form::open(['action' => 'VisitorsController@store', 'method', 'POST']) !!}
            <div class = "form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class = "form-group">
                {{Form::label('nic', 'NIC')}}
                {{Form::text('nic', '', ['class' => 'form-control', 'placeholder' => 'NIC'])}}
            </div>            
            <div class = "form-group">
                {{Form::label('vehicle_no', 'Vehicle No')}}
                {{Form::text('vehicle_no', '', ['class' => 'form-control', 'placeholder' => 'Vehicle No'])}}
            </div>
            <div class = "form-group">
                {{Form::label('date_of_arrival', 'Date of Arrival')}}
                {{Form::text('date_of_arrival', '', ['class' => 'form-control', 'placeholder' => 'Date of Arrival'])}}
            </div> 
            {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}                            
        {!! Form::close() !!}
    </body>
</html>