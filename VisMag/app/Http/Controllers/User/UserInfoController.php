<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use DB;
use Auth;

class UserInfoController extends Controller
{
    public function checkUserRole(){
        $role = DB::table('user_infos')
                ->select('userrole')
                ->where('email', '=', Auth::user()->email)
                ->get();
        return $role[0]->userrole;
    }

    //
    public function updateRole(Request $request)
    {
        $role = $this->checkUserRole();
        
        $user = UserInfo::find($request->input('userEmail'));
        $user->userrole = $request->input('userRole');
        if($request->input('userApproved') != null){
            if($role == 'ADMIN'){
                $user->approved = $request->input('userApproved');
                $test = 'User ' . $request->input('userName') . ' Approved';
            }else{
                return redirect('/Users')->with('error', 'Must have ADMIN privilages to approve visitors'); 
            }
        }else{
            if($role == 'ADMIN'){
                $user->approved = false;
                $test = 'User ' . $request->input('userName') . ' Updated';
            }else{
                return redirect('/Users')->with('error', 'Must have ADMIN privilages to approve visitors'); 
            }
        }

        $user->save();
        return redirect('/Users')->with('success', $test);        
    }    

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/Users')->with('success', 'User Deleted'); 
    }    
}
