<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'userId';
    protected $hidden = ['password','token','userId','companyId'];
    protected $fillable = [
        'email', 'fullName','phone', 'password','token','companyId','roleId'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company', 'companyId','companyId');
    }
    public function roles()
    {
        return $this->hasOne('App\UserRole', 'userId','userId');
    }
}
