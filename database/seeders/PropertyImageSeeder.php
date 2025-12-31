<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;

class PropertyImageSeeder extends Seeder
{
    /**
     * Sample real estate images from Unsplash.
     */
    protected $sampleImages = [
        // Exterior/Exterior views
        'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&q=80&w=800',
        // Interior views
        'https://images.unsplash.com/photo-1613545325278-f24b0cae1224?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1584622050111-993a426fbf0a?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1572375992501-4b0892d50c69?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&q=80&w=800',
        // More variety
        'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1592595896551-12b371d546d5?auto=format&fit=crop&q=80&w=800',
        'https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?auto=format&fit=crop&q=80&w=800',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = Property::all();

        foreach ($properties as $property) {
            // Skip if property already has images
            if ($property->images()->count() > 0) {
                continue;
            }

            // Get 3-5 random images for each property
            $imageCount = rand(3, 5);
            $shuffledImages = collect($this->sampleImages)->shuffle()->take($imageCount);

            foreach ($shuffledImages as $index => $imageUrl) {
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_url' => $imageUrl,
                    'is_primary' => $index === 0, // First image is primary
                    'order' => $index,
                ]);
            }

            $this->command->info("Added {$imageCount} images to: {$property->title}");
        }

        $this->command->info('Property images seeding completed!');
    }
}
