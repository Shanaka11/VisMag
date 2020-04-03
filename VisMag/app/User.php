<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use app\UserInfo;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    public function getInfo($email){
        $role = DB::table('user_infos')
                ->select('userrole')
                ->where('email', '=', $email)
                ->where('approved', '=', '1')                
                ->get();    

        if(count($role)> 0){
            return $role[0]->userrole;
        }else{
            return null;
        }                 
        //return $this->hasOne(UserInfo::class, $email);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
