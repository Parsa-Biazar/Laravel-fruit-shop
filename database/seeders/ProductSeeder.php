<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles =[
            'عطر',
            'ادکلن',
            'خوشبو کننده',
            'بادی اسپلش',
            'لوسیون',
        ];
        $status = ['published', 'draft'];
        $date_time = [
            '2023-12-12 12:12:40',
            '2023-11-12 12:41:40',
            '2024-05-01 12:45:40',
            '2024-04-01 01:15:40',
            '2024-06-01 02:46:40',
            '2024-07-01 03:54:40',
            '2024-08-01 04:18:40',
        ];
        $price = [
            '140$',
            '110$',
            '10$',
            '19$',
            '25$',
            '40$',
            '65$',
            '95$',
        ];
        $faker = factory::create('fa_IR');
        $posts = 100;
        $specialPostsCount = 3;

        for ($i = 1; $i <= $posts; $i++) {
            $image_number = (rand(1, 22));

            DB::table('products')->insert([
                'title' => $titles[rand(0, count($titles) - 1)],
                'description' => $faker->realText('70'),
                'image' => "pro-$image_number.jpg",
                'status' => $status[rand(0, count($status) - 1)],
                'post_date' => $date_time[rand(0, count($date_time) - 1)],
                'created_at' => $date_time[rand(0, count($date_time) - 1)],
                'updated_at' => $date_time[rand(0, count($date_time) - 1)],
                'price' => $price[rand(0, count($price) - 1)],
            ]);

            if ($i <= $specialPostsCount) {
                DB::table('products')->insert([
                    'title' => $titles[rand(0, count($titles) - 1)],
                    'description' => $faker->realText('70'),
                    'image' => "pro-$image_number.jpg",
                    'status' => $status[rand(0, count($status) - 1)],
                    'post_date' => $date_time[rand(0, count($date_time) - 1)],
                    'created_at' => $date_time[rand(0, count($date_time) - 1)],
                    'updated_at' => $date_time[rand(0, count($date_time) - 1)],
                    'price' => $price[rand(0, count($price) - 1)],
                    'is_special' => 'special',
                ]);
            }
        }
    }
}
