<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table="order_details";
    protected $fillable=['order_id','product_id','quantity','amount'];
    
}
// <input type="text" name="country" value="{{$getCountryCode->country_code}}">