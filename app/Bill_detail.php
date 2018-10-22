<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table='bill_detail';

    protected  $fillable=['id','id_bill','id_product','quantity','unit_price'];

    public $timestamps=false;

    public function bill(){
        return $this->belongsTo('App\Bill');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

}
