<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
    'title',
    'slug',
    'description',
    'price',
    'location',
    'bedrooms',
    'bathrooms',
    'surface',
    'listing_type',
    'status'
];

  protected $casts = [
        'price' => 'decimal:2',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'surface' => 'integer',
    ];
    
}
