<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;

class UserInfoController extends Controller
{
    //
    public function updateRole(Request $request)
    {
        $user = UserInfo::find($request->input('userEmail'));
        $user->userrole = $request->input('userRole');
        if($request->input('userApproved') != null){
            $user->approved = $request->input('userApproved');
            $test = 'User ' . $request->input('userName') . ' Approved';
        }else{
            $user->approved = false;
            $test = 'User ' . $request->input('userName') . ' Updated';
        }
/*
        $test = $request;
        dd($test);
        Log::info($test); // will show in your log
        var_dump($test);
*/
        $user->save();
        return redirect('/Users')->with('success', $test);        
    }    

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/Users')->with('success', 'User Deleted'); 
    }    
}
