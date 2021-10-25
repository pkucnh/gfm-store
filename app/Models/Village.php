<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'type', 'district_id'
    ];
    protected $primarykey = 'id';
    protected $table = 'villages';
}
