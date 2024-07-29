<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'updated_at',
        'created_at',
    ];

    function item()
    {
        return $this->hasMany(Items::class);
    }
}
