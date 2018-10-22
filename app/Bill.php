<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table='bills';

    protected  $fillable=['id','id_customer','date_order','total','payment','note'];

    public $timestamps=false;

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function bill_detail(){
        return $this->hasMany('App\Bill_detail');
    }
}
