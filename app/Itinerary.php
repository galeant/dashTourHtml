<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $table = 'itinerary';
    protected $primaryKey = 'itineraryId';
    protected $hidden = ['itineraryId', 'productId', 'created_at', 'updated_at'];
    protected $fillable = [
        'day',
        'startTime',
        'endTime',
        'agendaCategory',
        'destinationId',
        'agenda',
        'description',
        'productId'
    ];

    public function destination(){
        return $this->hasOne('App\Destination', 'destinationId','destinationId');
    }
    
    
}
