<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = 'destination';
    protected $primaryKey = 'destinationId';
    protected $hidden = ['country', 'pivot', 'created_at', 'updated_at'];
    protected $fillable = ['destination','village','district','city','province','latitude','longitude', 'placeVisitHours', 'placeVisitMinutes','placeScheduleType', 'destinationPhoneNumber', 'destinationAddress', 'placeTypeId  '];

    public function destinations(){
        return $this->belongsToMany('App\Product', 'product_destination','destinationId', 'productId');
    }
    // BETA
    public function province(){
        return $this->belongsTo('Laravolt\Indonesia\Models\Province', 'provinceId', 'id');
    }
    public function city(){
        return $this->belongsTo('Laravolt\Indonesia\Models\City', 'cityId', 'id');
    }
    
}
