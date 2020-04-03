<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //Primary Key
    public $primaryKey = 'email';

    public function getUser(){
        return $this->belongsTo('app\User');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'user_role', 'undefined',
    ];    
}
