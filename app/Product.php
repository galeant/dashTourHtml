<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'productId';
    protected $hidden = ['productId','companyId'];
    protected $fillable = [
        'PICName',
        'PICPhone',
        'productCode',
        'productName',
        'productCategory',
        'productType',
        'minPerson',
        'maxPerson',
        'meetingPointAddress',
        'meetingPointLatitude',
        'meetingPointLongitude',
        'meetingPointNote',
        'termCondition',
        'cancellationType',
        'minCancellationDay',
        'cancellationFee',
        'status',
        'companyId',
        'test'
    ];

    public function prices()
    {
        return $this->hasMany('App\Price', 'productId','productId');
    }
    public function image_destination()
    {
        return $this->hasMany('App\ImageDestination', 'productId','productId');
    }
    public function image_activity()
    {
        return $this->hasMany('App\ImageActivity', 'productId','productId');
    }
    public function image_accommodation()
    {
        return $this->hasMany('App\ImageAccommodation', 'productId','productId');
    }
    public function image_other()
    {
        return $this->hasMany('App\ImageOther', 'productId','productId');
    }
    public function videos()
    {
        return $this->hasMany('App\Videos', 'productId','productId');
    }
    public function itineraries()
    {
        return $this->hasMany('App\Itinerary', 'productId','productId');
    }
    public function schedules()
    {
        return $this->hasMany('App\Schedule', 'productId','productId');
    }
    // ORIGINALs
    // public function destinations()
    // {
    //     return $this->belongsToMany('App\Destination', 'product_destination','productId', 'destinationId');
    // }

    // BETA
    public function destinations()
    {
        return $this->hasMany('App\ProductDestination','productId', 'productId');
    }
    
    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'product_activity','productId', 'activityId');
    }
    public function company()
    {
        return $this->belongsTo('App\Company', 'companyId','companyId');
    }
    public function includes()
    {
        return $this->hasMany('App\Includes', 'productId','productId');
    }
    public function excludes()
    {
        return $this->hasMany('App\Excludes', 'productId','productId');
    }
 
}
