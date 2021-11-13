<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class childCate extends Model
{
    protected $table = 'child_category';
    protected $fillable = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

}
