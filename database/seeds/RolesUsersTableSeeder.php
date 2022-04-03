<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles_users")->insert([
            "user_id" => "1",
            "role_id" => "1",
        ]);
        DB::table("roles_users")->insert([
            "user_id" => "2",
            "role_id" => "2",
        ]);
        DB::table("roles_users")->insert([
            "user_id" => "3",
            "role_id" => "3",
        ]);
    }
}
