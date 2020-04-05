@extends('layouts.app')

@section('content')
<h1>Hi {{ Auth::user()->name }}</h1>
<div class="PageContainer">
    <div class="card" id='approval'>
        Unapproved Users/Visitors
        <div class="card-container">
            <a href="/Visitor/Approved/0">
                <div class="card-body link">
                    <h5 class="card-title">Visitors</h5>
                    <p class="card-text">{{ Auth::user()->getVisitorsApproved(0)}}</p>
                </div>
            </a>
            <a href="/User/Approved/0">       
                <div class="card-body link">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">{{ Auth::user()->getUsersApproved(0)}}</p>          
                </div>
            </a>
        </div> 
    </div>
    <div class="card">
        Arrived/Not Arrivedc Visitors
        <div class="card-container">
            <a href="/Visitor/Arrived/1">
                <div class="card-body link">
                    <h5 class="card-title">Arrived</h5>
                    <p class="card-text">{{ Auth::user()->getVisitorsArrived(1)}}</p>
                </div>
            </a>
            <a href="/Visitor/Arrived/0">       
                <div class="card-body link">
                    <h5 class="card-title">Not Arrived</h5>
                    <p class="card-text">{{ Auth::user()->getVisitorsArrived(0)}}</p>          
                </div>
            </a>
        </div>         
    </div> 
</div>
@endsection
