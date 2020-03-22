@extends('layouts.app')

@section('content')
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
@endsection
