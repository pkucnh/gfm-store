<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
public $timestamps = false;
protected $fillable = [
'coupon_code', 'coupon_name','coupon_condition','coupon_value', 'coupon_quanlity','coupon_status','date_start','date_end'
];
protected $primarykey = 'id';
protected $table = 'coupon';
}