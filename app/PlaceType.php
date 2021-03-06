<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    protected $table = 'place_type';
    protected $primaryKey = 'placeTypeId';
    protected $fillable = ['placeTypeNameEN','placeTypeNameID'];
}
