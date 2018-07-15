<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $primaryKey = 'scheduleId';
    protected $hidden = ['maximumBooking', 'maximumGroup', 'productId', 'created_at', 'updated_at'];
    protected $fillable = [
        'scheduleType',
        'startDate',
        'endDate',
        'startHours',
        'endHours',
        'maximumGroup',
        'maximumBooking',
        'minBookingDateTime',
        'productId'
    ];
}
