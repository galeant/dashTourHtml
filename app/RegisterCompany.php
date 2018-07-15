<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterCompany extends Model
{
    protected $table = 'register_company';
    protected $primaryKey = 'registerCompanyId';
    protected $fillable = [
        'companyName','registerUserId'
    ];
    public function user(){
    	return $this->belongsTo('App\RegisterUser', 'registerUserId','registerUserId');
    }
}
