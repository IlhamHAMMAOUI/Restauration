<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Private_dining extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'details',
        'contact_phone',
        'contact_email',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}
