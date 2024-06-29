<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description',
        'email', 
        'address', 
        'phone', 
        'managing_partner', 
        'chef_partner', 
        'general_manager', 
        'executive_chef', 
        'chef_de_cuisine', 
        'office_manager', 
        'sous_chefs', 
        'pastry', 
        'managers', 
        'wine_buyer', 
        'event_manager'
    ];
}
