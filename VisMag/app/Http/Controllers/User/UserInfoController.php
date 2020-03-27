<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    //
    public function createNew($email)
    {
        //Create Visitor
        $UserInfo = new UserInfo;
        $UserInfo->email = $email;
        $UserInfo->approved = false;
        $UserInfo->created_at = now();
        $UserInfo->updated_at = now();
        $UserInfo->save();

        return;
    }    
}
