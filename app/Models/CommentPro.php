<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPro extends Model
{
    protected $table = 'rating';
    protected $fillable = [];
    protected $primarykey = 'id';
    use HasFactory;
}
