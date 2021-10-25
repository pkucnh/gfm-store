<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'address', 'phone', 'notes', 'payment_type', 'ship_type',
    ];
    protected $primarykey = 'id';
    protected $table = 'shipping';
}
