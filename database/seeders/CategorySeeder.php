<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name'=>'Appartement', 'slug'=>'appart', 'icon'=>'building'],
            ['name'=>'Villa', 'slug'=>'villa', 'icon'=>'home'],
            ['name'=>'Terrain', 'slug'=>'terrain', 'icon'=>'layer-group'],
            ['name'=>'Maison', 'slug'=>'maison', 'icon'=>'house-user'],
            ['name'=>'Bureau', 'slug'=>'bureau', 'icon'=>'briefcase'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}