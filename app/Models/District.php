<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'type', 'city_id'
    ];
    protected $primarykey = 'id';
    protected $table = 'districts';
}
