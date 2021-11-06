<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name','slug','summary','image','content','post_day','views','category_id'
    ];
    protected $primarykey = 'id';
    protected $table = 'blog';

}
