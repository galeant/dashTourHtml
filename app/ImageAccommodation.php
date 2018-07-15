<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageAccommodation extends Model
{
    protected $table = 'image_accommodation';
    protected $primaryKey = 'id';
    protected $hidden = ['productId','id'];
    protected $fillable = [
        'url',
        'productId',
    ];
}
