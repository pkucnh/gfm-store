<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produts';
    protected $fillable = [];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
