<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];
    protected $primarykey = 'id';
    protected $table = 'category_blog';
}
