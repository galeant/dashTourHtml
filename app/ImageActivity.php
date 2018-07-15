<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageActivity extends Model
{
    protected $table = 'image_activity';
    protected $primaryKey = 'id';
    protected $hidden = ['productId','id'];
    protected $fillable = [
        'url',
        'productId',
    ];
}
