<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role_resource';

    function User(){
        return $this->belongsToMany('App\User','role_user','role_id','user_id');
    }
}
