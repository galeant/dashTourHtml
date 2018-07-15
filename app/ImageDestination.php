<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDestination extends Model
{
    protected $table = 'image_destination';
    protected $primaryKey = 'id';
    protected $hidden = ['productId','id'];
    protected $fillable = [
        'url',
        'productId',
    ];
}
