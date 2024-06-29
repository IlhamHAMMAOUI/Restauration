<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'specialties',
        'ingredients',
        'techniques',
        // 'image',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}
