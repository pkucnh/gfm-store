<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'slug', 'status'
    ];
    protected $primarykey = 'id';
    protected $table = 'category';
}
