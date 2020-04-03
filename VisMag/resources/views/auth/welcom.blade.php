@extends('layouts.app')

@section('content')
<h1>Hi {{ Auth::user()->name }}</h1>
<div class="PageContainer">
    <div class="card">
        Approval Pending Visitors/Users
        <div class="card-container">
            <a href="/Visitor/Arrived/0">
                <div class="card-body link">
                    <h5 class="card-title">Visitors</h5>
                    <p class="card-text">100</p>
                </div>
            </a>
            <a href="/User/Arrived/1">       
                <div class="card-body link">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">100</p>          
                </div>
            </a>
        </div> 
    </div>
    <div class="card">
        Visitors Arrived/ Yet to be Arrived Today
        <div class="card-container">
            <a href="/Visitor/Arrived/1">
                <div class="card-body link">
                    <h5 class="card-title">Arrived</h5>
                    <p class="card-text">100</p>
                </div>
            </a>
            <a href="/Visitor/Arrived/0">       
                <div class="card-body link">
                    <h5 class="card-title">Not Arrived</h5>
                    <p class="card-text">100</p>          
                </div>
            </a>
        </div>         
    </div> 
</div>
@endsection
