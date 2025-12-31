<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the category of this property.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all images for this property.
     */
    public function images()
    {
        return $this->hasMany(PropertyImage::class)->orderBy('order');
    }

    /**
     * Get the primary image for this property.
     */
    public function primaryImage()
    {
        return $this->hasOne(PropertyImage::class)->where('is_primary', true);
    }

    /**
     * Get the primary image URL or a fallback.
     */
    public function getPrimaryImageUrlAttribute()
    {
        $primary = $this->images->where('is_primary', true)->first();
        
        if ($primary) {
            return $primary->image_url;
        }

        // Fallback to first image or default
        $first = $this->images->first();
        return $first ? $first->image_url : 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&q=80&w=600';
    }
}