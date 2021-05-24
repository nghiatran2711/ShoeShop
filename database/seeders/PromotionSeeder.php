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
        $products = Product::pluck('id')->toArray();

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
            '2021-04-26 00:00:00',
            '2021-04-27 00:00:00',
            '2021-04-28 00:00:00',
            '2021-04-29 00:00:00',
            '2021-04-30 00:00:00',
            '2021-05-01 00:00:00',
        ];

        $endDates = [
            '2021-05-02 23:59:59',
            '2021-05-03 23:59:59',
            '2021-05-04 23:59:59',
            '2021-05-05 23:59:59',
            '2021-05-06 23:59:59',
            '2021-05-07 23:59:59',
            '2021-05-08 23:59:59',
        ];

        foreach ($products as $productId) {
            $promotion = [
                'discount' => $discounts[array_rand($discounts)],
                'product_id' => $productId,
                'begin_date' => $beginDates[array_rand($beginDates)],
                'end_date' => $endDates[array_rand($endDates)],
                'status' => 1,
            ];
            Promotion::create($promotion);
        }
    }
}
