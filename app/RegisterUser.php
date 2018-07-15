<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
	protected $table = 'register_user';
	protected $primaryKey = 'registerUserId';
	protected $hidden = ['password','token'];
	protected $fillable = [
        'email', 'fullName', 'password','companyName','token'
    ];

    public function company()
    {
        return $this->hasOne('App\RegisterCompany', 'registerUserId','registerUserId');
    }
}
