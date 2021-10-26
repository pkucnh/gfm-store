<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galley extends Model
{
    protected $table = 'gallerys';
    protected $fillable = [];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
