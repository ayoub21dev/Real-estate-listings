<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    /**
     * Get the property that owns this image.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
