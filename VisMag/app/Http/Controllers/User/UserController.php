<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\UserInfo;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function index(){
        $users = DB::table('users')
                        ->join('user_infos', 'users.email', '=', 'user_infos.email')
                        ->select('users.name', 'users.email', 'user_infos.userrole', 'user_infos.approved')
                        ->get();
        return view('user.userlist')->with('users', $users);
    }

}
