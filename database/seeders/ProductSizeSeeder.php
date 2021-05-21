<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizeSeeder extends Seeder
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
        $quantities=[15,20,25,30,35,65,90,100,200];
        foreach($products as $product){
            $sizes=Size::pluck('id')->toArray();
            foreach($sizes as $size ){
                $productSize = [
                    'product_id' => $product,
                    'size_id'=>$size,
                    'quantity'=>$quantities[array_rand($quantities)],
                ];
                DB::table('product_size')->insert($productSize);
            }
        }
    }
}
