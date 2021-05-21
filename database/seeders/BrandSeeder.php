<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brands = [
           'Adidas',
           'Nike',
           'Balenciaga',
           'Gucci',
           'Dolce & Gabbana',
           'Burberry',
           'Geox',
           'Crown',
        ];
        foreach($brands as $brand){
            Brand::create([
                'name' => $brand,
            ]);
        }
        
    }
}
