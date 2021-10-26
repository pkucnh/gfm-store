<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_code','product_id','name','price','sales_quanlity','coupon','fee'
    ];
    protected $primarykey = 'id';
    protected $table = 'order_detail';//
    public function voucher(){
        return $this->belongsTo('App\Models\coupon', 'order_code');
    }
}
