@extends('layouts.app')

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll("tr[data-name]");

            rows.forEach(row => {
                row.addEventListener("click", () => {
                    sidePanOpen(row.innerHTML);                
                })
            })
        });    

    document.addEventListener("DOMContentLoaded", () => {
            const searchInputUser = document.getElementById('searchUser');

            searchInputUser.addEventListener("keyup", () => {
                filterUseTable();                
            })
    });
</script>
@endsection

@section('content')
<!-- List -->
    <input id="searchUser" type="text" placeholder="Search..">
    <table class="table">
        <thead>
            <tr>
                <!-- Table Headers -->              
                <th scope="col">Name</th>
                <th scope="col">EMail</th>
                <th scope="col">User Role</th>
                <th scope="col">Approved</th>
            </tr>
        </thead>
        <tbody id="userList">
            <!-- Table Rows -->
            @if(count($users) > 0)
                @foreach ($users as $user)
                    <tr data-name= {{$user->name}} >
                    <!-- <th scope="row">1</th> -->
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->userrole}}</td>
                        <td>{{$user->approved}}</td>                                                    
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>        
@endsection
