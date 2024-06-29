<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'instructions',
        'phone_number',
        'online_reservation_link',
        'hours_of_operation',
        'corkage_info',
        'location_address',
        'directions',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}
