<?php

namespace Database\Seeders;

use App\Models\Promotion;
use App\Models\Size;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        \App\Models\Admin::factory(1)->create();
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ProductSizeSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PromotionSeeder::class);
        // $this->call(ProductPromotion::class);
    }
}
