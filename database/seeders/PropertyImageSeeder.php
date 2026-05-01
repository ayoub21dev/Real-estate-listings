<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyImageSeeder extends Seeder
{
    /**
     * Curated real-estate images from Unsplash, grouped by the demo CSV titles.
     */
    protected array $imageSets = [
        'appartement-haut-standing' => [
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&q=80&w=1000',
        ],
        'villa-beverly-hills' => [
            'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&q=80&w=1000',
        ],
        'studio-agdal' => [
            'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1584622050111-993a426fbf0a?auto=format&fit=crop&q=80&w=1000',
        ],
        'terrain-industriel' => [
            'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?auto=format&fit=crop&q=80&w=1000',
        ],
        'riad-historique' => [
            'https://images.unsplash.com/photo-1564501049412-61c2a3083791?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1528909514045-2fa4ac7a08ba?auto=format&fit=crop&q=80&w=1000',
            'https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&q=80&w=1000',
        ],
    ];

    protected array $fallbackImages = [
        'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&q=80&w=1000',
        'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&q=80&w=1000',
        'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=1000',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = Property::all();

        foreach ($properties as $property) {
            $property->images()->delete();

            $key = Str::slug($property->title);
            $images = $this->imageSets[$key] ?? $this->fallbackImages;

            foreach ($images as $index => $imageUrl) {
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_url' => $imageUrl,
                    'is_primary' => $index === 0,
                    'order' => $index,
                ]);
            }

            $this->command->info('Added '.count($images).' images to: '.$property->title);
        }

        $this->command->info('Property images seeding completed.');
    }
}
