<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Excludes extends Model
{
    protected $table = 'excludes';
    protected $hidden = ['productId','created_at','updated_at'];
    protected $fillable = ['productId','description'];
}
