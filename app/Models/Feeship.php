<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'city_id', 'district_id', 'city_id'
    ];
    protected $primarykey = 'id';
    protected $table = 'feeships';
}
