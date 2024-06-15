<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles=[
            'تسلا',
            'پلی استیشن',
            'نایک',
            'استارباکس',
            'پنبه ریز',
            'بادران',
            'شتاب آموز',
            'اطلس مد',
            'پاشیک',
            'دیجیکالا',
        ];
        $img_number=(rand(1,10));
        $faker=factory::create('fa_IR');
        $date_time = [
            '2023-12-12 12:12:40',
            '2023-11-12 12:41:40',
            '2024-05-01 12:45:40',
            '2024-04-01 01:15:40',
            '2024-06-01 02:46:40',
            '2024-07-01 03:54:40',
            '2024-08-01 04:18:40',
        ];
        $brandsnumber=5;
        $specialbrandscount=3;

        for ($i = 1; $i <= $brandsnumber; $i++) {
            $img_number = rand(1, 9);

            DB::table('brands')->insert([
                'title' => $titles[array_rand($titles)],
                'image' => "brand-$img_number.png",
                'description' => $faker->realText(70),
                'color'=> '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT),
                'post_date' => $date_time[rand(0, count($date_time) - 1)],
                'created_at' => $date_time[rand(0, count($date_time) - 1)],
                'updated_at' => $date_time[rand(0, count($date_time) - 1)],
            ]);

            if ($i <= $specialbrandscount) {
                DB::table('brands')->insert([
                    'title' => $titles[array_rand($titles)],
                    'image' => "brand-$img_number.png",
                    'description' => $faker->realText(70),
                    'is_special' => 'special',
                    'post_date' => $date_time[rand(0, count($date_time) - 1)],
                    'created_at' => $date_time[rand(0, count($date_time) - 1)],
                    'updated_at' => $date_time[rand(0, count($date_time) - 1)],
                ]);
            }
        }
    }
}
