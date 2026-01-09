<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1 - Add users directly:
        // DB::table("users")->insert([
        //     "username" => "User01",
        //     "password" => bcrypt("senha"),
        //     "active" => true
        // ]);

        //2 - Add more users
        // $users = [
        //     [
        //         "username" => "User02",
        //         "password" => bcrypt("senha"),
        //     ],

        //     [
        //         "username" => "User03",
        //         "password" => bcrypt("senha"),
        //     ],

        //     [
        //         "username" => "User04",
        //         "password" => bcrypt("senha"),
        //     ]
        // ];

        // DB::table("users")->insert($users);

        //3 - Add users with random data:
        $users = [];

        for ($index = 0; $index < 10; $index++) {
            $users[] = [
                "username" => Str::random(10),
                "password" => bcrypt("senha"),
                "active" => (bool) rand(0, 1)
            ];
        }

        DB::table("users")->insert($users);
    }
}
