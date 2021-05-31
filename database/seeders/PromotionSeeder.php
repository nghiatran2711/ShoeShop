<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $products = Product::pluck('id')->toArray();

        // discount: 5%, 10%, 20%, ...
        $discounts = [
            5,
            10,
            20,
            30,
            40,
            50,
        ];

        $beginDates = [
            '2021-04-25 00:00:00',
            '2021-05-31 00:00:00',
            '2021-06-15 00:00:00',
        ];

        $endDates = [
            '2021-07-02 23:59:59',
            '2021-06-18 23:59:59',
            '2021-06-20 23:59:59',
        ];

        // foreach ($products as $productId) {
        for ($j = 0; $j < 4; $j++) {
            $promotion = [
                'discount' => $discounts[array_rand($discounts)],
                'begin_date' => $beginDates[array_rand($beginDates)],
                'end_date' => $endDates[array_rand($endDates)],
                'status' => 1,
            ];
            Promotion::create($promotion);
        }
        // }
    }
}
