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
        // discount: 5%, 10%, 20%, ...
        $discounts = [
            5,
            10,
            20,
            30,
            40,
            50,
        ];

        $beginDate = date('2021-04-01 00:00:00');
        $endDate = date('Y-m-d 23:59:59', strtotime($beginDate . ' + 1 months'));
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate . ' - 1 days'));
        
        for ($i = 0; $i <  10; $i++) {
            $promotion = [
                'name' => 'Promotion Name ' . ($i + 1), 
                'discount' => $discounts[array_rand($discounts)],
                'begin_date' => $beginDate,
                'end_date' => $endDate,
                'quantity' => 100,
                'status' => 1,
            ];

            Promotion::create($promotion);

            /**
             * update increment for Begin Date
             * 
             * add +1 day for Begin Date
             */
            $beginDate = date('Y-m-d 00:00:00', strtotime($endDate . ' + 1 days'));

            /**
             * update increment for End Date
             * 
             * @add +1 month for End Date
             * @subtract -1 day for End Date
             */
            $endDate = date('Y-m-d 23:59:59', strtotime($beginDate . ' + 1 months'));
            $endDate = date('Y-m-d 23:59:59', strtotime($endDate . ' - 1 days'));
        }
    }
}
