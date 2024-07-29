<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'license',
        'price',
        'isActive',
        'image',
        'category',
        'itemDate',
        'updated_at',
        'created_at',
    ];


    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
