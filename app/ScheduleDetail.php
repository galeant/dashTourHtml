<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
    protected $table = 'schedule_detail';
    protected $primaryKey = 'id';
    protected $hidden = ['maximumBooking', 'maximumGroup', 'productId', 'created_at', 'updated_at'];
    protected $fillable = [
        'startDate',
        'endDate',
        'startHours',
        'endHours',
        'scheduleId'
    ];
}
