<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'adminId';
    protected $hidden = ['password'];
    protected $fillable = ['email','password','token'];
    
}
