<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
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
        $users = User::All();
        return view('user.userlist')->with('users', $users);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_role = $request->input('user_role');
        $user->arrived = 'false';
        $user->approved = 'false';
        $user->save();

        return redirect($redirectTo)->with('success', 'User Updated');        
    }    

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect($redirectTo)->with('success', 'User Deleted'); 
    }

}
