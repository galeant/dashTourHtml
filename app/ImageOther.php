<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageOther extends Model
{
    protected $table = 'image_other';
    protected $primaryKey = 'id';
    protected $hidden = ['productId','id'];
    protected $fillable = [
        'url',
        'productId',
    ];
}
