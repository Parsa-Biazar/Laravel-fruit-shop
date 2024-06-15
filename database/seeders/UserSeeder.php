<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_time = [
            '2023-12-12 12:12:40',
            '2023-11-12 12:41:40',
            '2024-05-01 12:45:40',
            '2024-04-01 01:15:40',
            '2024-06-01 02:46:40',
            '2024-07-01 03:54:40',
            '2024-08-01 04:18:40',
        ];
        DB::table('users')->insert([
            'name'=>'Parsa',
            'email'=>'a@b.com',
//            'password'=>bcrypt('12121212'),
            'password'=>hash::make('12121212'),
            'created_at'=>$date_time[rand(1,count($date_time)-1)],
            'updated_at'=>$date_time[rand(1,count($date_time)-1)],
        ]);
        $usernumber=10;
        $faker=factory::create('fa_IR');
        for ($i = 1 ; $i <= $usernumber ; $i++){
            DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>'123456',
                'created_at'=>$date_time[rand(1,count($date_time)-1)],
                'updated_at'=>$date_time[rand(1,count($date_time)-1)],
            ]);
        }
    }
}
