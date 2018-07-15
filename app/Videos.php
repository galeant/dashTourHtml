<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'video_url';
    protected $primaryKey = 'id';
    protected $hidden = ['productId','id'];
    protected $fillable = [
        'url',
        'productId',
    ];
}
