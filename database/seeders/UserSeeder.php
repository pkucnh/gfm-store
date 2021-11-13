<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "fullname" => "Admin",
                "image" => "admin.png",
                "email" => "admin@gfmstore.com",
                "password" => bcrypt("admin@123")
            ],
            [
                "fullname" => "Nguyễn Hữu Thọ",
                "image" => "bi.jpg",
                "email" => "nht4793@gfmstore.com",
                "password" => bcrypt("nhtps12285")
            ],
        ];
        DB::table('users')->insert($data);
    }
}
