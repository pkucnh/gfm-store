<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallrey extends Model
{
    protected $table = 'gallery';
    protected $fillable = [];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
