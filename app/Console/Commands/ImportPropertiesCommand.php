<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Property;
use Illuminate\Support\Str;

class ImportPropertiesCommand extends Command
{
    protected $signature = 'properties:import-csv';
    protected $description = 'Import properties from CSV';

    public function handle()
    {
        $path = storage_path('app/data/properties.csv');

        if (!file_exists($path)) {
            $this->error("Fichier introuvable !");
            return;
        }

        $file = fopen($path, 'r');
        fgetcsv($file); 

        while (($row = fgetcsv($file)) !== false) {
            
            Property::create([
                'title'        => $row[0],
                'slug'         => Str::slug($row[0]) . '-' . rand(100, 999),
                'description'  => $row[1],
                'price'        => $row[2],
                'location'     => $row[3],
                'listing_type' => $row[4],
                'category_id'  => $row[5],
                'bedrooms'     => $row[6],
                'bathrooms'    => $row[7],
                'surface'      => $row[8],
                'status'       => 'approved'
            ]);
            
            $this->info("Imported: " . $row[0]);
        }

        fclose($file);
        $this->info("Terminé !");
    }
}