<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPromotion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products=Product::pluck('id')->toArray();

        $promotions=Promotion::pluck('id')->toArray();
        foreach($promotions as $promotion){

            for ($j = 0; $j < 10; $j++) {
                $productPromotion = [
                    'product_id' => $products[array_rand($products)],
                    'promotion_id'=>$promotion,
                ];
                DB::table('product_promotion')->insert($productPromotion);
            }
                
        }
    }
}