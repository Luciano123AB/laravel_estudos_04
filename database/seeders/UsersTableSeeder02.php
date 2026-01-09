<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder02 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "username" => "User02",
                "password" => bcrypt("senha"),
            ],

            [
                "username" => "User03",
                "password" => bcrypt("senha"),
            ],

            [
                "username" => "User04",
                "password" => bcrypt("senha"),
            ]
        ];

        DB::table("users")->insert($users);
    }
}
