<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'customer_id','shipping_id','status','order_code','created_at'
    ];
    protected $primarykey = 'id';
    protected $table = 'orders';
    public function order_detail(){
        return $this->belongsTo('App\Models\order_detail', 'order_code');
    }
}
