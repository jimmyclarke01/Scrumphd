<?php

namespace PhD\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserPermission extends Eloquent
{
    protected $table = 'users_permissions';
    
    protected $fillable = [
        'is_admin',
		'is_me'
    ];
    
    public static $defaults = [
        'is_admin' => false,
		'is_me' => false
    ];
}