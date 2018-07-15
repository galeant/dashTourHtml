<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'companyId';
    protected $hidden = ['companyId'];
    protected $fillable = [
        'fullName',
        'phone',
        'email',
        'role',
        'companyName',
        'companyPhone',
        'companyEmail',
        'companyProvince',
        'companyCity',
        'companyAddress',
        'companyPostal',
        'companyWeb',
        'companyBookSystem',
        'companyBankName',
        'companyBankAccountNumber',
        'companyBankAccountTitle',
        'companyBankAccountName',
        'companyFileReq',
        'status'
    ];
    public function users()
    {
        return $this->hasMany('App\User', 'companyId','companyId');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'companyId','companyId');
    }
    public function province()
	{
	    return $this->hasOne('Laravolt\Indonesia\Models\Province','id','companyProvince');
    }
    public function city()
	{
	    return $this->hasOne('Laravolt\Indonesia\Models\City','id','companyCity');
	}
}
