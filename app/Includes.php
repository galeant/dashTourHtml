<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Includes extends Model
{
    protected $table = 'includes';
    protected $hidden = ['productId','created_at','updated_at'];
    protected $fillable = ['productId','description'];
}
