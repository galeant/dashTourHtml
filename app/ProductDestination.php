<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDestination extends Model
{
    protected $table = 'product_destination';
    protected $fillable = ['productId','provinceId','cityId','destinationId'];

    // BETA
    public function province(){
        return $this->belongsTo('Laravolt\Indonesia\Models\Province','provinceId', 'id');
    }
    public function city(){
        return $this->belongsTo('Laravolt\Indonesia\Models\City','cityId', 'id');
    }
    public function dest(){
        return $this->belongsTo('App\Destination','destinationId', 'destinationId');
    }
}
