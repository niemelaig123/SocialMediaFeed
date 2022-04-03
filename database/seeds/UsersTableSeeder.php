<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "name" => "Jane Useradmin",
            "email" => "jane@example.com",
            "password" =>  password_hash("password", PASSWORD_BCRYPT)
        ]);
        DB::table("users")->insert([
            "name" => "Bob Moderator",
            "email" => "bob@example.com",
            "password" =>  password_hash("password", PASSWORD_BCRYPT)
        ]);
        DB::table("users")->insert([
            "name" => "Susan Themeadmin",
            "email" => "susan@example.com",
            "password" =>  password_hash("password", PASSWORD_BCRYPT)
        ]);
    }
}
