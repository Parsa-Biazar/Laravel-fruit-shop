<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_times = [
            '2023-12-12 12:12:40',
            '2023-11-12 12:41:40',
            '2024-05-01 12:45:40',
            '2024-04-01 01:15:40',
            '2024-06-01 02:46:40',
            '2024-07-01 03:54:40',
            '2024-08-01 04:18:40',
        ];

        for ($i = 1; $i <= 103; $i++) {
            for ($j = 1; $j <= rand(1, 3); $j++) {
                DB::table('product_Brands')->insert([
                    'product_id' => $i,
                    'brand_id' => rand(1, 8),
                    'created_at' => $date_times[rand(0, count($date_times) - 1)],
                    'updated_at' => $date_times[rand(0, count($date_times) - 1)],
                ]);
            }
        }
    }
}
