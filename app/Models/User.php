<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_MANAGER = 'MANAGER';

    protected $table = 'users';
    protected $fillable = [
        'name' ,'email','password', 'role', 'phone','file_name','file_size'
    ];


}
