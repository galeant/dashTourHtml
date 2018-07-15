<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';
    protected $primaryKey = 'priceId';

    protected $hidden = ['priceId','productId', 'created_at', 'updated_at'];
    protected $fillable = [
        'priceType',
        'numberOfPerson',
        'priceIDR',
        'priceUSD',
        'productId'
    ];
    public function product()
    {
        return $this->belongTo('App\Price', 'priceId','productId');
    }

}
