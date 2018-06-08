<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';

    protected  $fillable=['name','alias','price','intro','content','image','keywords','description'];

    public $timestamps=false;
}
