<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
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

        $prices = [
            100000,
            200000,
            300000,
            400000,
            500000,
            600000,
            800000,
            900000,
            1000000,
            1100000,
            1200000,
            1300000,
            1500000,
            1600000,
            1700000,
            1800000,
            1900000,
            2000000,
            3000000,
            4000000,
            5000000,
            6000000,
            7000000,
            8000000,
            9000000,
        ];

        $beginDates = [
            '2021-03-25',
            '2021-03-26',
            '2021-03-27',
            '2021-03-28',
            '2021-03-29',
            '2021-03-30',
        ];

        $endDates = [
            '2022-05-02',
            '2022-05-03',
            '2022-05-04',
            '2022-05-05',
            '2022-05-06',
            '2022-05-07',
            '2022-05-08',
        ];

        foreach ($products as $productId) {
            $price = [
                'price' => $prices[array_rand($prices)],
                'product_id' => $productId,
                'begin_date' => $beginDates[array_rand($beginDates)],
                'end_date' => $endDates[array_rand($endDates)],
            ];
            Price::create($price);
        }
    }
}
