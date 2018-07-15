<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductActivity extends Model
{
    protected $table = 'product_activity';
    protected $fillable = ['productId','activityId'];

}
