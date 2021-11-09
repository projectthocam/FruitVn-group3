<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    protected $fillable = ['id', 'user_id', 'role_id'];
}
